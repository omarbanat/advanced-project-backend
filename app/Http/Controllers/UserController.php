<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function getAllUsers($role = null)
    {
        try {
            if ($role) {
                return User::where('role', '=', $role)->get();
            }

            $user = User::all();
            return response()->json([
                'message' => $user
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Errir retreving all users...", 'error' => $th
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
            'role' => 'required|in:admin,teacher,student',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $hashedPassword = Hash::make($request->password);
        $user = User::create($request->all());
        $user->password = $hashedPassword;

        if ($user->save()) {
            return response()->json(['message' => 'User created successfully'], 201);
        } else {
            return response()->json(['message' => 'Unable to create user'], 500);
        }
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

    public function deleteUser(Request $request, $id, $delete = true)
    {
        try {
            if ($delete != true) {
                $delete = false;
            }

            $user = User::findOrFail($id);

            $user->isDeleted = $delete;

            try {
                $user->update();
                return response()->json([
                    'message' => 'User deleted successfully!!'
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Error occured while deleting!',
                    'error' => $th
                ], 404);
            }
        } catch (\Throwable $th) {
            return
                response()->json(['message' => 'User not found!', 'error' => $th], 404);
        }
    }
}
