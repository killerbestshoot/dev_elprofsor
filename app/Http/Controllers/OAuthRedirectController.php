<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class OAuthRedirectController extends Controller
{
    public function redirectToProvider($provider): \Illuminate\Foundation\Application|\Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (!in_array($provider, ['github', 'facebook', 'google', 'discord'])) {
            return redirect('/')->withErrors('Fournisseur non valide');
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        if (!in_array($provider, ['github', 'facebook', 'google', 'discord'])) {
            return redirect('/')->withErrors('Fournisseur non valide');
        }

        try {
            $oauthUser = Socialite::driver($provider)->user();

            $user = $this->findOrCreateUser($oauthUser, $provider);

            Auth::login($user);
            return redirect('/home');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('/home');
        }
    }

    protected function findOrCreateUser($oauthUser, $provider)
    {
        $validator = Validator::make([
            'name' => $oauthUser->name,
            'email' => $oauthUser->email,
            $provider . '_id' => $oauthUser->id,
        ], [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            $provider . '_id' => 'required|unique:users,' . $provider . '_id',
        ]);
//        dd($validator->attributes());
        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }
//        dd($validator);
////         Créer ou récupérer l'utilisateur
        return User::updateOrCreate(
            [$provider . '_id' => $oauthUser->id],
            ['name' => $oauthUser->name, 'email' => $oauthUser->email]
        );
    }
}
