<?php

namespace App\Http\Controllers;

use App\UserExtensions\BusinessUser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
/**
 * Class BusinessController
 * @package App\Http\Controllers
 * @method
 */
class BusinessController extends Controller
{
    private $users;

    /**
     * BusinessController constructor.
     * @param User $users users store
     */
    public function __construct(User $users)
    {
        $this->$users = $users;
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

        $query = BusinessUser::with('profile_data', 'weekly_worktime', 'vocation', 'upcoming_hours', 'appointments', 'users_services');
        if ($request->has('name')){ //TODO first + last name
            $query->where('first_name', 'LIKE', $request->input('name'));
        }
        if ($request->has('category_id')){
            $query->where('category_id', '=', $request->input('category_id'));
        }
        if ($request->has('city')){
            $query->where('address', 'LIKE', $request->input('city'));
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
        //TODO count free time
        //TODO send ALL data including relationships
        return $businessUser;
    }
}
