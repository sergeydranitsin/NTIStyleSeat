<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Authentication extends Controller
{
    public function getUser()
    {
        return Auth::user();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        // validate request
        if ($validator->passes()) {
            // check if user with this email exists
            $user = User::where('email', $request['email'])->first();

            if (!$user) {
                return response()->json(['error' =>
                    ['email' => 'User with this email is not registered.']]);
            }

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials, $request->has('remember'))) {
                return response()->json(['success' => 'User logged in.']);
            }

            return response()->json(['error' => ['password' => 'The password is wrong.']]);
        }

        return response()->json(['error' => $validator->errors()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegisterBusinessForm()
    {
        return view('register_business');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerBusiness(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'mobile_phone' => 'string|max:255',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', //"password_confirmation"
        ]);

        // validate request
        if ($validator->passes()) {
            $u = User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'first_name' => $data['first_name'],
                'second_name' => $data['second_name'],
                'mobile_phone' => @$data['mobile_phone'],
                'is_business' => true,
            ]);
            Auth::login($u);

            return response()->json(['success' => 'User registered.']);
        }

        return response()->json(['error' => $validator->errors()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegisterClientForm()
    {
        return view('register_client');

    }

    public function registerClient(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'mobile_phone' => 'string|max:255',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', //"password_confirmation"
        ]);

        // validate request
        if ($validator->passes()) {
            $u = User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'first_name' => $data['first_name'],
                'second_name' => $data['second_name'],
                'mobile_phone' => @$data['mobile_phone'],
                'is_business' => false
            ]);
            Auth::login($u);

            return response()->json(['success' => 'User registered.']);
        }

        return response()->json(['error' => $validator->errors()]);
    }

}
