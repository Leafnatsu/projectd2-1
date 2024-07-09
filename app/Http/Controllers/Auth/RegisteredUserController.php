<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'address' => ['required'],
                'phone' => ['required'],
            ],
            [
                'name.required' => 'โปรดกรอกชื่อ-นามสกุล',
                'name.string' => 'ห้ามใช้อักขระพิเศษ',
                'name.max' => 'ชื่อ-นามสกุล ยาวเกินไป',

                'email.required' => 'โปรดกรอกอีเมล์',
                'email.string' => 'ห้ามใช้อักขระพิเศษ',
                'email.lowercase' => 'โปรดใช้ตัวพิมพ์เล็ก',
                'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
                'email.max' => 'อีเมล์ยาวเกินไป',
                'email.unique' => 'มีอีเมล์นี้ในระบบแล้ว',

                'password.required' => 'โปรดกรอกรหัสผ่าน',
                'password.confirmed' => 'โปรกรอกยืนยันรหัสผ่าน',

                'address.required' => 'โปรดกรอกที่อยู่',

                'phone.required' => 'โปรดกรอกเบอร์โทรศัพท์',
            ]
        );

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone,
            ]
        );

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));

    }

}
