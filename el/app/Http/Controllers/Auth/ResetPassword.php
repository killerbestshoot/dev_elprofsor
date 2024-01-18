<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use App\Models\Password;
use App\Models\User;
use App\Models\UserPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password as PasswordReset;
use Illuminate\Support\Facades\Redirect;

class ResetPassword extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return the resetpassword view
        return view('auth.resetpassword');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function sendResetLinkEmail(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = PasswordReset::sendResetLink(
            $request->only('email')
        );

        return $status === PasswordReset::RESET_LINK_SENT
            ? Redirect::route('password.reset') // Rediriger vers la page pour saisir le token
            : back()->withErrors(['email' => __($status)]);
    }
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed', // Assurez-vous d'avoir un champ 'password_confirmation' dans votre formulaire
        ]);

        $status = PasswordReset::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password), // Utilisation de la fonction bcrypt pour crypter le mot de passe
                ])->setRememberToken(\Illuminate\Support\Str::random(60)); // Utilisation de Str::random pour générer un nouveau token

                $user->save();

                event(new \Illuminate\Auth\Events\PasswordReset($user)); // Événement PasswordReset
            }
        );

        return $status === PasswordReset::PASSWORD_RESET
            ? Redirect::route('login')->with('status', trans($status)) // Redirection vers la page de connexion avec un message de succès
            : back()->withErrors(['email' => trans($status)]); // Redirection avec les erreurs vers la page précédente
    }

}
