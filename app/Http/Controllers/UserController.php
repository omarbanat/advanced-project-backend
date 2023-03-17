<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class UserController extends Controller
{

    public function getAllUsers($role = null)
    {
        try {
            if ($role) {
                $user = User::where('role', '=', $role)->get();
                return response()->json([
                    'message' => $user,
                ], 200);
            }

            $user = User::all();
            return response()->json([
                'message' => $user,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Error retrieving all users...",
                'error' => $th
            ], 500);
        }
    }


    public function addUser(Request $request)
    {
        $rules = [
            'fName' => 'required|string|max:25',
            'lName' => 'required|string|max:25',
            'email' => 'required|email|unique:users,email|max:50',
            'password' => 'required|string|min:8|max:255',
            'DOB' => 'required|date',
            'phoneNumber' => 'required|regex:/^[0-9]{11}$/',
            'gender' => 'required|in:male,female',
            'role' => 'required|in:admin,mentor,student',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $hashedPassword = Hash::make($request->password);

        $user = new User();
        $user->fName = $request->input('fName');
        $user->lName = $request->input('lName');
        $user->email = $request->input('email');
        $user->password = $hashedPassword;
        $user->DOB = $request->input('DOB');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->gender = $request->input('gender');
        $user->role = $request->input('role');

        if ($user->save()) {
            $token = $user->createToken('myapptoken')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json(['data' => $response, 'message' => 'User created successfully'], 201);
        } else {
            return response()->json(['message' => 'Unable to create user'], 500);
        }
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();
        if (!$user) {
            return response([
                'message' => 'Email not found'
            ], 401);
        }

        // Check password
        if (!Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong password'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }


    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->fName = $request->input('fName', $user->fName);
            $user->lName = $request->input('lName', $user->lName);
            $user->email = $request->input('email', $user->email);
            $user->password = $request->input('password', $user->password);
            $user->DOB = $request->input('DOB', $user->DOB);
            $user->phoneNumber = $request->input('phoneNumber', $user->phoneNumber);
            $user->gender = $request->input('gender', $user->gender);
            $user->role = $request->input('role', $user->role);
            try {
                $user->update();
                return response()->json([
                    'message' => 'User updated successfully!!',
                    'data' => $user
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Error occured while updating!',
                    'error' => $th
                ], 404);
            }
        } catch (\Throwable $th) {
            return
                response()->json(['message' => 'User not found!', 'error' => $th], 404);
        }
    }

    // public function deleteUser(Request $request, $id, $delete = true)
    // {
    //     try {
    //         if ($delete != true) {
    //             $delete = false;
    //         }

    //         $user = User::findOrFail($id);

    //         $user->isDeleted = $delete;

    //         try {
    //             $user->update();
    //             return response()->json([
    //                 'message' => 'User deleted successfully!!'
    //             ], 200);
    //         } catch (\Throwable $th) {
    //             return response()->json([
    //                 'message' => 'Error occured while deleting!',
    //                 'error' => $th
    //             ], 404);
    //         }
    //     } catch (\Throwable $th) {
    //         return
    //             response()->json(['message' => 'User not found!', 'error' => $th], 404);
    //     }
    // }
    public function deleteUser($id)
    {
        $result = User::where('id', $id)->delete();
        if ($result) {
            return response()->json([
                'message' => 'User deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    }
    public function restoreUser($id)
    {
        User::withTrashed()->find($id)->restore();
        return back();
    }
}
