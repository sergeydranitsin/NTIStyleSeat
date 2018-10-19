<?php

namespace App\Http\Controllers;
use Auth;
use Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
    }
    public function redirectToVkontakte()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleVkontakteCallback()
    {
        $user = Socialite::driver('vkontakte')->user();
    }
    public function UserInfo(){
        $user = Socialite::driver('facebook')->user();
        $user=Socialite::driver('vkontakte')->user();

        // OAuth Two Providers
        $token = $user->token;
        if($token){
            return response()->json($user, 200);
        }
        return response()->json(['lg'=>'not login'], 400);
    }
}
