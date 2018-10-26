<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
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

            return response()->json(['error' => ['password' => ['The password is wrong.']]]);
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
            'mobile_phone' => 'string|regex:/^[0-9]{10}$/',
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
            'mobile_phone' => 'string|regex:/^[0-9]{10}$/',
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


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public
    function BusinessSN($provider)
    {
        $user = Socialite::driver($provider)->user();
        if (!$user) {
            return response()->json(['error' => "unauth"]);
        }

        if (!Auth::user()) {
            $name = preg_split('/[\s,]+/', $user->getName());
            $data = ["first_name" => $name[0], 'second_name' => $name[1], 'email' => $user->accessTokenResponseBody['email']];

            $validator = Validator::make($data, [
                'first_name' => 'required|string|max:255',
                'second_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);
            $data['social_id'] = $user->getId();
            // validate request
            if ($validator->passes()) {
                $u = User::create([
                    'email' => $data['email'],
                    'first_name' => $data['first_name'],
                    'second_name' => $data['second_name'],
                    'social_id' => $data['social_id'],
                    'is_business' => true
                ]);
                Auth::login($u);
                return redirect('/');
            }

            return response()->json(['error' => $validator->errors()]);
        }
    }

    public
    function ClientSN($provider)
    {
        //  $data = $request->all();
        $user = Socialite::driver($provider)->user();
        if (!$user) {
            return response()->json(['error' => "unauth"]);
        }
        $u = User::where('social_id', $user->getId())->first();
        if ($u) {
            Auth::login($u);
            return redirect('/');
        }

        if (!Auth::user()) {
            $name = preg_split('/[\s,]+/', $user->getName());
            $data = ["first_name" => $name[0], 'second_name' => $name[1]];
            if ($provider == "vkontakte")
                $data['email'] = $user->accessTokenResponseBody['email'];
            else $data['email'] = $user->getEmail();
            $validator = Validator::make($data, [
                'first_name' => 'required|string|max:255',
                'second_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);
            $data['social_id'] = $user->getId();
            // validate request
            if ($validator->passes()) {
                $u = User::create([
                    'email' => $data['email'],
                    'first_name' => $data['first_name'],
                    'second_name' => $data['second_name'],
                    'social_id' => $data['social_id'],
                    'is_business' => false
                ]);
                Auth::login($u);

                return redirect('/');
            }

            return response()->json(['error' => $validator->errors()]);
        }
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function redirectToVK()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
