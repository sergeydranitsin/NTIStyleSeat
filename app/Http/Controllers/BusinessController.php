<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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

        //TODO accept text/html or application/json
        return view();
    }

    /**
     * Returns view for business user: name, portfolio, coordinates etc
     * @param mixed $id id of business user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        //TODO check is business
        //TODO return to view: name, portfolio, city+coordinates, description, categories, time, social media profiles, photos...
        return view();
    }
}
