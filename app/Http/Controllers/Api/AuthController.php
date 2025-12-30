<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            // 1️⃣ Validate input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required|string|min:6',
            ]);

            // 2️⃣ Create user
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'password_confirmation' => Hash::make($validated['password']),
                'email_verified_at' => now(),
            ]);

            // 3️⃣ Create token
            $token = $user->createToken('auth_token')->plainTextToken;

            // 4️⃣ Success response
            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully',
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 201);

        } catch (ValidationException $e) {
            // ❌ Validation error
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);

        } catch (Exception $e) {
            // ❌ Any other error (DB, Sanctum, etc.)
            Log::error('Register API Error', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Registration failed',
            ], 500);
        }
    }

    // User Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    // Optional: Logout (revoke current token)
    public function logout(Request $request)
    {
        /** @var PersonalAccessToken $token */
        $token = $request->user()->currentAccessToken();
        $token->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logged out successfully',
        ]);
    }
    public function userlist(Request $request)
    {
        // Fetch all users from the SQLite database
        $users = User::all(); // returns a collection of all users

        // Optional: paginate results
        // $users = User::paginate(20);

        // Return JSON response
        return response()->json([
            'status' => 'success',
            'total' => $users->count(),
            'data' => $users
        ]);
    }
}
