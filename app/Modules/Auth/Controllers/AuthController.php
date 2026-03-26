<?php

namespace App\Modules\Auth\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Auth\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function requestOtp(Request $request)
    {
        // Validate the request
        $request->validate([
            'phone' => 'required|string',
        ]);

        // Call service to request OTP
        $result = $this->authService->requestOtp($request->phone);

        if ($result) {
            return response()->json(['message' => 'OTP sent successfully.'], 200);
        }
        return response()->json(['message' => 'Failed to send OTP.'], 500);
    }

    public function verifyOtp(Request $request)
    {
        // Validate the request
        $request->validate([
            'phone' => 'required|string',
            'otp' => 'required|string',
        ]);

        // Call service to verify OTP
        $result = $this->authService->verifyOtp($request->phone, $request->otp);

        if ($result) {
            return response()->json(['message' => 'OTP verified successfully.'], 200);
        }
        return response()->json(['message' => 'Invalid OTP.'], 400);
    }
}
