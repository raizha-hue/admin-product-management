<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        if (!$user->is_admin) {
            return response()->json([
                'message' => 'Access denied. Admin account required.'
            ], 403);
        }

        $token = Str::random(60);

        $user->api_token = $token;
        $user->save();

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json([
            'message' => 'Logout successful'
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ]);
    }



    public function webLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Invalid email or password.');
    }

    if (!$user->is_admin) {
        return back()->with('error', 'Access denied. Admin account required.');
    }

    session([
        'admin_id' => (string) $user->_id,
        'admin_name' => $user->name,
        'admin_email' => $user->email,
    ]);

    return redirect('/admin/dashboard');
}
}