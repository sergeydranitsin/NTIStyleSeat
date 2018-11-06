<?php

namespace App\Http\Controllers;

use App\UserExtensions\BusinessUser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class BusinessController
 * @package App\Http\Controllers
 * @method
 */
class BusinessController extends Controller
{
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
        $businessUser->load('profile_data', 'portfolio_photos', 'weekly_worktime', 'appointments',
            'users_services', 'users_services.services', 'users_services.services.categories');
        //TODO count free time
        if ($is_json) {
            return $businessUser;
        }
        else {
            return view('profile', compact('businessUser'));
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
