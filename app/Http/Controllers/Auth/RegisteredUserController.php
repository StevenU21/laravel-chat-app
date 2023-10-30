<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'file' => 'required|image|mimes:jpeg,png,jpg,jfif,heif,webp|max:8192'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // if ($request->hasFile('profileImg') && $request->file('profileImg')->isValid()) {
        //     $name = $user->id . '-' . now()->format('YmdHis') . '.' . $request->file('profileImg')->getClientOriginalExtension();
        //     $user->profileImgOri = $request->file('profileImg')->getClientOriginalName();
        //     $user->profileImg = $name;
        //     $request->file('profileImg')->storeAs('profiles', $name); // Asegúrate de que la carpeta 'profiles' exista
        // }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
