<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
	public function githubRedirect(){
		return Socialite::driver('github')->redirect();
	}
	public function githubCallback(){
		$user = Socialite::driver('github')->user();
		$this->_registerOrLoginGithubUser($user);
		return redirect()->route('/home');
	}
	protected function _registerOrLoginGithubUser($incomingUser)
    {
        $user = User::where('github_id', $incomingUser->id)->first();
        if (!$user) {
            $user = new User();
            $user->name = $incomingUser->nickname;
            $user->email = $incomingUser->email;
            $user->github_id = $incomingUser->id;
            $user->password = encrypt('password');
            $user->save();
        }
        Auth::login($user);
    }
}
