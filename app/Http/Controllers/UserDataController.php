<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserDataController extends Controller
{
    public function getUserById($id)
    {
        try {
            $user = User::select('id', 'name', 'email','created_at', 'updated_at')->findOrFail($id);
            return response()->json(['user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function getAllUsers(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $users = User::select('id', 'name', 'email', 'created_at', 'updated_at')->paginate($perPage);

        return response()->json([
            'users' => $users->items(),
            'pagination' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
            ]
        ]);
    }

    // Authenticate user and generate token
    public function authenticate(Request $request)
    {
        try {
            // Validate user credentials
            $credentials = $request->only('email', 'password');
            if (!Auth::attempt($credentials)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            // Retrieve the authenticated user
            $user = Auth::user();

            // Generate token for the authenticated user
            $token = $user->createToken('auth-token')->plainTextToken;

            // Return token to the user
            return response()->json(['token' => $token]);
        } catch (ValidationException $e) {
            // If validation fails (incorrect credentials), return JSON response with error messages
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // For other exceptions, return a generic error message
            return response()->json(['error' => 'Failed to authenticate.'], 500);
        }
    }
}
