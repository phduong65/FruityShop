<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
        // $validator = Validator::make($request->all(), [
        //     'current_password' => [
        //         'required',
        //         function ($attribute, $value, $fail) use ($request) {
        //             if (!Hash::check($value, $request->user()->password)) {
        //                 $fail('Mật khẩu cũ không đúng.');
        //             }
        //         },
        //     ],
        //     'password' => ['required', Password::defaults(), 'confirmed'],
        // ], [
        //     'current_password.required' => 'Vui lòng nhập mật khẩu cũ.',
        // ]);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator, 'updatePassword');
        // }

        // $request->user()->update([
        //     'password' => Hash::make($request->input('password')),
        // ]);

        // return back()->with('status', 'password-updated');
    }
}
