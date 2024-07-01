<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user()
    {
        $user = User::paginate(10); // ดึงข้อมูลผู้ใช้และแบ่งหน้า
        return view('dashboard.user.index', compact('user'));
    }

    public function enable($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->status = true;
            $user->save();
        }
        return redirect()->route('dashboard.user.index');
    }

    public function disable($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->status = false;
            $user->save();
        }
        return redirect()->route('dashboard.user.index');
    }
}