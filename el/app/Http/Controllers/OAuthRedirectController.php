<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
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

    public function handleProviderCallback(Request $request, $provider): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (!in_array($provider, ['github', 'facebook', 'google', 'discord'])) {
            return redirect('/')->withErrors('Fournisseur non valide');
        }


        if (!$request->hasCookie('logout_state') || $request->cookie('logout_state') !== 'true') {
            // Si le cookie 'logout_state' n'existe pas ou sa valeur n'est pas 'true'
            try {
                $oauthUser = Socialite::driver($provider)->user();
                $user = $this->findOrCreateUser($oauthUser, $provider);

                if (!$user instanceof Authenticatable) {
                    return redirect('register')->withErrors('Erreur d\'authentification');
                }

                Auth::login($user);

                // Nettoyer le cookie d'état de déconnexion après la connexion réussie

            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return redirect('register')->withErrors('Une erreur est survenue lors de la connexion.');
            }

        }

        return redirect('/home')->withCookie(cookie()->forget('logout_state'));

    }


    protected function make_registration($provider)
    {

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
        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }
//         Créer ou récupérer l'utilisateur
        return User::updateOrCreate(
            [$provider . '_id' => $oauthUser->id],
            ['name' => $oauthUser->name, 'email' => $oauthUser->email]
        );
    }


}
