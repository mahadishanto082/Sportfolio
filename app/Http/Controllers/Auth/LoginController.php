<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirect after login
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    // Use the admin guard
    protected function guard()
    {
        return auth()->guard('admin');
    }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    // Use 'email' for login (matches your Blade input)
    public function username()
    {
        return 'email';
    }

    // Logout method
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
