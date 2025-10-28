<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showAdminLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $this->logActivity('admin', Auth::guard('admin')->id(), $request, 'login');
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Incorrect email or password']);
    }

    public function adminDashboard()
    {
        return view('admin.index');
    }

    private function logActivity($guard, $id, Request $request, $action)
    {
        AuditLog::create([
            'guard' => $guard,
            'user_id' => $id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'action' => $action,
        ]);
    }
}
