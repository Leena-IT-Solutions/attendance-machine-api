<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'attendance_api_url' => ['nullable', 'url', 'max:255'],
            'api_token'         => ['nullable', 'string', 'max:80'],
            'month_start_date'  => ['nullable', 'integer', 'min:1', 'max:31'],
            'match_threshold'   => ['nullable', 'numeric', 'min:0.5', 'max:1.0'],
            'show_mask_warning' => ['nullable', 'boolean'],
            'camera_resolution' => ['nullable', 'string', 'in:low,medium,high'],
            'enable_blink_liveness' => ['nullable', 'boolean'],
            'require_scanner_auth' => ['nullable', 'boolean'],
            'kiosk_pin'         => ['nullable', 'string', 'max:6'],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ]);
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'Password updated successfully'
        ]);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Delete related employees and their photos
        foreach ($user->employees as $employee) {
            if ($employee->photo) {
                \Storage::disk('public')->delete($employee->photo);
            }
            $employee->delete();
        }

        $user->delete();

        return response()->json([
            'message' => 'Account deleted successfully'
        ]);
    }
}
