<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmailUpdateRequest;
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Services\Admin\AdminService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use App\Http\Middleware\Authenticate;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected AdminService $adminService
    ){}

    /**
     * Show the form for admins profile update.
     */
    public function showProfileUpdateForm(): View
    {
        return view('admin.update-profile');
    }

    /**
     * Update admins profile.
     */
    public function profileUpdate(ProfileUpdateRequest $request): RedirectResponse
    {
        $result = $this->adminService->profileUpdate($request->validated());

        if ($result['success']) {
            return redirect()
                ->back()
                ->withSuccess('Profile updated successfully.');
        } else {
            return redirect()
                ->back()
                ->withError($result['message']);
        }
    }

    /**
     * Show the form for admins settings.
     */
    public function settings(): View
    {
        return view('admin.profile-settings');
    }

    /**
     * Update admins password.
     */
    public function passwordUpdate(PasswordUpdateRequest $request): RedirectResponse
    {
        $result = $this->adminService->passwordUpdate($request->validated());

        if ($result['success']) {
            return redirect()
                ->back()
                ->withSuccess('Password updated successfully.');
        } else {
            return redirect()
                ->back()
                ->withError($result['message']);
        }
    }

    /**
     * Update admins email.
     */
    public function emailUpdate(EmailUpdateRequest $request): RedirectResponse
    {
        $result = $this->adminService->emailUpdate($request->validated());

        if ($result['success']) {
            return redirect()
                ->back()
                ->withSuccess('Email updated successfully.');
        } else {
            return redirect()
                ->back()
                ->withError($result['message']);
        }
    }
}

