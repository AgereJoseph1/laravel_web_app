<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserDataController extends Controller
{
    public function getUserById($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:users,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        try {
            
            $user = User::select('id', 'name', 'email', 'created_at', 'updated_at')
                ->findOrFail($id);
    
            return response()->json(['user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Server error'], 500);
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

    
}