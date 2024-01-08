<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;

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
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'foto' => ['nullable', 'mimes:png,jpg,jpeg'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'Kolom nama wajib diisi.',
            'name.string' => 'Kolom nama harus berupa teks.',
            'name.max' => 'Kolom nama maksimal :max karakter.',
            'foto.mimes' => 'Kolom foto harus berupa file dengan format PNG, JPG, atau JPEG.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.string' => 'Kolom email harus berupa teks.',
            'email.lowercase' => 'Kolom email harus dalam huruf kecil.',
            'email.email' => 'Kolom email harus berupa alamat email yang valid.',
            'email.max' => 'Kolom email maksimal :max karakter.',
            'email.unique' => 'Email ini sudah digunakan. Silakan gunakan email lain.',
            'password.required' => 'Kolom password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.min' => 'Kolom password harus minimal :min karakter.',
            'password.uppercase' => 'Kolom password harus mengandung setidaknya satu huruf kapital.',
            'password.lowercase' => 'Kolom password harus mengandung setidaknya satu huruf kecil.',
            'password.digits' => 'Kolom password harus mengandung setidaknya satu angka.',
            'password.symbols' => 'Kolom password harus mengandung setidaknya satu karakter simbol.',
        ]);

        $filename = null; // Initialize $filename

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('users'), $filename);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $filename,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($user->role == 'admin') {
            return redirect(RouteServiceProvider::ADMIN);
        }
        if ($user->role == 'user') {
            return redirect(RouteServiceProvider::HOME);
        }
        if ($user->role == 'owner') {
            return redirect(RouteServiceProvider::OWNER);
        }
    }
}
