<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    // ฟังก์ชันสำหรับตรวจสอบข้อมูลรับรองผู้ใช้และเข้าสู่ระบบ
    function authenticate(ServerRequestInterface $request): RedirectResponse
    {
        $data = $request->getParsedBody();
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        // ทำการตรวจสอบข้อมูลรับรองผู้ใช้โดยใช้ method attempt()
        if (Auth::attempt($credentials)) {
            // สร้าง ID เซสชันใหม่เพื่อความปลอดภัย
            session()->regenerate();

            // เปลี่ยนเส้นทางไปยัง URL ที่ร้องขอหรือไปยังเส้นทาง products.list หากไม่ได้ระบุ
            return redirect()->intended(route('home.home'));
        } else {
            // หากข้อมูลรับรองไม่ถูกต้อง ให้เปลี่ยนเส้นทางกลับและแสดงข้อผิดพลาด
            return redirect()->back()->withErrors([
                'credentials' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    // แสดงแบบฟอร์มเข้าสู่ระบบ
    function showLoginForm(): View
    {
        return view('login.form');
    }

    // ฟังก์ชันสำหรับออกจากระบบ
    function logout(): RedirectResponse
    {
        Auth::logout();
        session()->invalidate();

        // สร้าง CSRF TOKEN ใหม่เพื่อความปลอดภัย
        session()->regenerateToken();
        return redirect()->route('login');
    }
}
