<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        foreach ($users as  $user) {
            if (Cache::has('user-is-online-' . $user->id)) {
                $user->userProfile->status = true;
            } else {
                $user->userProfile->status = false;;
            }
        }
        return view('manager.user.manager_user', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //
        return view('manager.user.add-manager-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birth' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Check if the email already exists
        $existingUser = User::where('email', $request->input('email'))->first();
        if ($existingUser) {
            return redirect()->route('users.index')->with('error', 'Email đã tồn tại. Không thể thêm người dùng.');
        }

        // Tạo mật khẩu ngẫu nhiên
        $password = Str::random(8); // 8 ký tự ngẫu nhiên
        $password .= mt_rand(0, 9); // Thêm một số ngẫu nhiên
        $password = Str::upper(Str::random(1)) . $password;


        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password), // Lưu mật khẩu đã hash
        ]);
        $user->save();


        $userProfile = new UserProfile([
            'user_id' => $user->id,
            'name' => $user->name,
            'birth' => $request->input('birth'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'introduce' => $request->input('introduce'),
        ]);
        $userProfile->save();
        // Gửi email
        Mail::to($user->email)->send(new UserCreated($password));
        return redirect()->route('users.index')->with('successAdd', 'Thêm thành công !');
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
        $user = User::find($id);
        if (!$user) {
            return abort(404);
        }
        return view('manager.user.edit-manager-user')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birth' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

      

        $user = new User($request->all());
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
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
        return redirect()->route('users.index')->with('success', 'Sửa thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        $user->userProfile->delete();
        $user->delete();
        return response()->json();
    }
    public function disable(User $user)
    {
        $user->userProfile->update([
            'is_disabled' => true,
        ]);
        return redirect()->route('users.index')->with('success', 'Tài khoản đã bị vô hiệu hóa.');
    }
    public function unDisable(User $user)
    {
        $user->userProfile->update([
            'is_disabled' => false,
        ]);
        return redirect()->route('users.index')->with('success', 'Tài khoản vừa được mở khóa.');
    }
}
