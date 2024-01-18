<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        /*
        Validation
        */
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        /*
        Database Insert
        */
        try {
            $user = User::create([
                'name' => strtolower($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } catch (QueryException $exception) {
            // Si une exception de base de données survient
            if ($exception->getCode() == 23000) {
                // Code 23000 correspond à une violation de clé unique
                return back()->withErrors([
                    'email' => 'adres imel sa egziste deja tampri chwazi yon lot',
                ])->withInput($request->except('password'));
            } else {
                // Si une autre exception survient, vous pouvez la gérer selon vos besoins
                return back()->withErrors([
                    'email' => 'gen yon ere ki pase pandan inskripsyon an tampri eseye anko !',
                ])->withInput($request->except('password'));
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function githubCallback() #import user info from github
    {


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
}
