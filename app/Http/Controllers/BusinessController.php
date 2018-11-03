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
        /*
        //TODO use `with` for N+1 problem
        //TODO join all needed tables
        $query = App\User::query();

        if ($request->has('name')){
            $query->where('name', 'LIKE', $request->input('name'));
        }
        if ($request->has('$category_id')){
            $query->where('category_id', '=', $request->input('category_id'));
        }
        if ($request->has('$city')){
            $query->where('city', 'LIKE', $request->input('city'));
        }
        //TODO add date parameter
        //TODO pagination(50), OFFSET+LIMIT
        */
        return "Not Implemented";
    }

    /**
     * Returns view for business user: name, portfolio, coordinates etc
     * @param Request $request
     * @param BusinessUser $businessUser
     * @return mixed
     */
    public function show(Request $request, BusinessUser $businessUser){
        //TODO free time
        //TODO send ALL data including relationships
        return $businessUser;
    }
}
