<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request);
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function passwordupdate(PasswordUpdateRequest $request): RedirectResponse
    {
        if (!Hash::check($request->old_password, $request->user()->password)) {
            return redirect()->back()->with('error', 'Password lama tidak cocok');
        }

        $request->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function uploadfoto(Request $request)
    {
        $request->validate([
            'foto' => ['required','image', 'max:10000']
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $foto = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('profiles'), $foto);
        }

        $request->user()->update([
            'foto' => $foto
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');

    }
}
