<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            // return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');

            $url = '';
            if ($request->user()->role === 'admin') {
                $url = '/admin/dashboard';
                return redirect()->route('admin.dashboard');
            } elseif ($request->user()->role === 'teacher') {
                $url = '/teacher/dashboard';
                return redirect()->route('teacher.dashboard');
            } elseif ($request->user()->role === 'student') {
                $url = '/dashboard';
            }
            return redirect()->intended($url);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
    }
}
