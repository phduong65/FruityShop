<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Http\Controllers\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\UserProfile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    // public function edit(Request $request): View
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //     ]);
    // }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.index')->with('status', 'profile-updated');
    // }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'birth' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $user = new User($request->all());
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->save();
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        if ($userProfile) {
            $userProfile->name = $user->name;
            $userProfile->birth = $request->input('birth');
            $userProfile->phone = $request->input('phone');
            $userProfile->address = $request->input('address');
            $userProfile->introduce = $request->input('introduce');
            $userProfile->save();
        }
        return redirect()->route('profile.index')->with('success', 'Cập nhật thành công !');
    }
    public function edit(Request $request, $id)
    {
        $user = new User($request->all());
        $user = User::find($id);
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('profile.index')->with('success', 'Cập nhật thành công !');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function index()
    {
        $user = Auth::user();
        return view('profile.index', ['user' => $user]);
    }
    public function show(Request $request, $id)
    {
        $user = new UserProfile($request->all());
        $user = UserProfile::find($id);
        if ($request->hasFile('avatar')) {
            // if (file_exists(public_path('img/' . $user->avatar))) {
            //     unlink(public_path('img/' . $user->avatar));
            // }
            $file = $request->file('avatar');
            $destinationPath = 'img';
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $user->avatar = $fileName;
        }
        $user->save();
        return redirect()->route('profile.index')->with('success', 'Upload avatar thành công !');
    }
    public function uploadCover(Request $request, $id)
    {
        $user = new UserProfile($request->all());
        $user = UserProfile::find($id);
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $destinationPath = 'img';
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $user->cover = $fileName;
        }
        $user->save();
        return redirect()->back()->with('success', 'Upload ảnh bìa thành công !');
    }
}
