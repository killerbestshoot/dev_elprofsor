<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
     * @throws ValidationException
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
         * verify user existance
         */

        try {
            // Verify if the user is already exist
            $existingUser = User::where('email', $validated['email'])->first();
            if ($existingUser) {
                throw ValidationException::withMessages([
                    'email' => ['imel sa egziste deja'],
                ]);
            }

            // Create a new user with the valid credentials
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // Auth the user newly created
            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        } catch (ValidationException $validationException) {
            throw $validationException;
        } catch (\Throwable $th) {
            Log::error($th);
            return back()->withErrors(['message' => 'Gen yon bagay ki mal pase re eseye Tampri']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // list all users
        $users = User::all();

        return view('auth.register', compact('users'));
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
        // modify data about a user, use a try catch
        try {
            $validated = $request->validate([
                'name' =>'required',
                'email' =>'required|email',
            ]);

            $user = User::find($id);
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->save();

            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            Log::error($th);
            return back()->withErrors(['message' => 'Gen yon bagay ki mal pase re eseye Tampri']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete a user in a try statement
        try {
            $user = User::find($id);
            $user->delete();

            return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            Log::error($th);
            return back()->withErrors(['message' => 'Gen yon bagay ki mal pase re eseye Tampri']);
        }

    }
}
