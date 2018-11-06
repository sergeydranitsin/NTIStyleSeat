<?php

namespace App\Http\Controllers;

use App\UserExtensions\BusinessUser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * Class BusinessController
 * @package App\Http\Controllers
 * @method
 */
class BusinessController extends Controller
{
    /**
     * Check is worktime valid
     * @param $weekday
     * @param $startTime
     * @param $endTime
     * @param $startBreak
     * @param $endBreak
     * @return bool
     */
    private function _isWeekdayWorktimeValid($weekday, $startTime, $endTime, $startBreak, $endBreak){
        return ($weekday != null && $startTime != null && $endTime != null
            && $weekday >= 1 && $weekday <= 7
            && $startTime < $endTime
            && $startTime >= 0 && $endTime <=96
            && (
                ($endBreak == null && $startTime == null)
                ||
                ($endBreak != null && $startTime != null
                    && $startBreak < $endBreak
                    && $endBreak < $endTime && $startBreak > $startTime)
            )
        );
    }

    /**Converts time from "15-minute-discrete" to plain text
     * @param $time_discrete
     * @return null|string
     */
    private function _convertTimeFromDiscreteToText($time_discrete){
        if ($time_discrete == null) return null;
        $hours = (int) ($time_discrete / 4);
        $hours_1st = (int) ($hours / 10);
        $hours_2nd = $hours % 10;

        $minutes = ($time_discrete % 4) * 15;
        $minutes_1st = (int) ($minutes / 10);
        $minutes_2nd = $minutes % 10;
        return "{$hours_1st}{$hours_2nd}:{$minutes_1st}{$minutes_2nd}";
    }

    /**
     * Creates text description of worktime
     * @param array $weekly_worktime
     * @return array
     */
    private function _buildWorktimeText($weekly_worktime){
        $weekly_worktime_copy = $weekly_worktime->toArray();
        $converted = array();
        foreach ($weekly_worktime_copy as $row){
            $weekday = $row['weekday'];
            unset($row['weekday'], $row['created_at'], $row['updated_at'], $row['id'], $row['user_id']);
            $row['start_time'] = $this->_convertTimeFromDiscreteToText($row['start_time']);
            $row['end_time'] = $this->_convertTimeFromDiscreteToText($row['end_time']);
            $row['start_break_time'] = $this->_convertTimeFromDiscreteToText($row['start_break_time']);
            $row['end_break_time'] = $this->_convertTimeFromDiscreteToText($row['end_break_time']);

            $converted[$weekday] = $row;
        }
        return $converted;
    }

    /**
     * Creates array of available appointment time
     * @param $weekly_worktime
     * @param $appointments
     * @return array
     */
    private function _buildAvailableTime($weekly_worktime, $appointments){
        $weekly_worktime_copy = $weekly_worktime->toArray();
        $appointments_copy = $appointments->toArray();

        $worktime_dict = array();
        foreach ($weekly_worktime_copy as $row) {
            $weekday = $row['weekday'];
            unset($row['weekday']);
            $worktime_dict[$weekday] = $row;
        }

        $today = Carbon::today();
        $next_week = [];
        for ($i = 1 ; $i <= 7; $i++) {
            $next_week[] = $today->copy()->addDays($i);
        }

        $available_week = [];
        foreach ($next_week as $day){
            $day_of_week = $day->dayOfWeek == 0 ? 7 : $day->dayOfWeek;
            if (isset($worktime_dict[$day_of_week])){
                $worktime = $worktime_dict[$day_of_week];
                unset($worktime['user_id'], $worktime['id']);

                $available_day = range($worktime["start_time"], $worktime["end_time"]-1);
                if (isset($worktime["start_break_time"], $worktime["end_break_time"])){
                    $break = range($worktime["start_break_time"], $worktime["end_break_time"]-1);
                    $available_day = array_values(array_diff($available_day, $break));
                }
                foreach ($appointments_copy as $appointment){
                    if (Carbon::parse($appointment["day"]) == $day){
                        $appointment_duration = $appointment["users_services"]["duration"];
                        $appointment_start_time = $appointment["start_time"];
                        $appointed = range($appointment_start_time, $appointment_start_time + $appointment_duration - 1);
                        $available_day = array_values(array_diff($available_day, $appointed));
                        unset($appointment);
                    }
                }

                $available_week[] = ["day" => $day, "available"=>$available_day];
            }
        }
        return $available_week;
    }

   /**
     * Returns view with search form and results.
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        $per_page = 50;
        $is_json = $request->has('json');

        $query = BusinessUser::with('profile_data', 'weekly_worktime', 'appointments',
            'users_services', 'users_services.services', 'users_services.services.categories');
        if ($request->has('name')){
            $name = $request->input('name');
            $query->where(DB::raw("CONCAT(first_name, ' ', second_name)"), 'LIKE', "%{$name}%");
        }
        if ($request->has('category_id')){
            $query->where('category_id', '=', $request->input('category_id'));
        }
        if ($request->has('city')){
            $city = $request->input('city');
            $query->where('city', 'LIKE', "%{$city}%");
        }
        //TODO add date parameter

        if ($is_json){
            $limit = $query->count();

            $offset = $request->has('offset') ? $request->input('offset') : 0;
            $users = $query->offset($offset)->limit($per_page)->get();
            $on_this_page = count($users);

            return compact('users', 'offset', 'limit', 'on_this_page' );
        }
        else {
            $query->paginate($per_page);
            return "View not implemented";
        }
    }

    /**
     * Returns view for business user: name, portfolio, coordinates etc
     * @param Request $request
     * @param BusinessUser $businessUser
     * @return mixed
     */
    public function show(Request $request, BusinessUser $businessUser){
        $is_json = $request->has('json');
        $businessUser->load('profile_data', 'portfolio_photos', 'users_services',
            'users_services.service', 'users_services.service.category');

        $weekly_worktime_plain = $businessUser->weekly_worktime;
        $appointments = $businessUser->appointments->load("users_services");

        $weekly_worktime = $this->_buildWorktimeText($weekly_worktime_plain);
        $available_time = $this->_buildAvailableTime($weekly_worktime_plain, $appointments);

        $businessUser->makeHidden('weekly_worktime', 'appointments')->toArray();
        if ($is_json) {
            return compact('businessUser', 'weekly_worktime', 'available_time');
        }
        else {
            return view('profile', compact('businessUser', 'weekly_worktime', 'available_time'));
        }
    }

    /**
     * Return view to edit profile
     * @param BusinessUser $businessUser
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(BusinessUser $businessUser){
        if (!Auth::id() == $businessUser->id){
            return abort(403);
        }
        else {
            $businessUser->load('profile_data', 'portfolio_photos', 'weekly_worktime', 'appointments',
                'users_services', 'users_services.services', 'users_services.services.categories');
            return view('profileEdit', compact('businessUser'));
        }
    }

    /**
     * Edits profile
     * @param BusinessUser $businessUser
     * @return string
     */
    public function update(BusinessUser $businessUser){
        return "Not implemented";
    }
}
