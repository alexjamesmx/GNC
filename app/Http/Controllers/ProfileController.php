<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        // return view('profile.edit', [
        //     'user' => $request->user(),
        //     'section_cute' => 'Perfil',
        // ]);

        $role_type = Auth::user()->role->id;
        if ($role_type == 1) {
            $role = 'admin';
            return view('admin.admin', ['section' => 'profile', 'section_cute' => 'Perfil', 'role' => $role, 'user' => $request->user(), 'role_type' => $role_type]);
        } elseif ($role_type == 2) {
            $role = 'enterprise';
        } elseif ($role_type == 3) {
            $role = 'tecnico';
            return view('tecnico.general.general', ['section' => 'profile', 'section_cute' => 'Perfil', 'role' => $role, 'role_cute' => 'Técnico', 'user' => $request->user(), 'role_type' => $role_type]);
        }
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
