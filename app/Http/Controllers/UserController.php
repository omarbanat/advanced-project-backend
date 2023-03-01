<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function getAllUsers()
    {
        $user = User::all();
        return response()->json([
            'message' => $user
        ]);
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

        // $user = User::find($id);

        // if ($user) {
        //     error_log("REQUEST: " . $request);
        //     error_log("TEST");
        //     error_log($request['fName']);
        //     // $user->fName = $request->fName;
        //     error_log("ENTERED HERE");

        //     // if ($request->has('lName')) {
        //     //     $user->lName = $request->input('lName');
        //     //     $fieldUpdated = true;
        //     // }

        //     // if ($request->has('email')) {
        //     //     $user->email = $request->input('email');
        //     //     $fieldUpdated = true;
        //     // }

        //     // if ($request->has('password')) {
        //     //     $user->password = $request->input('password');
        //     //     $fieldUpdated = true;
        //     // }

        //     // if ($request->has('DOB')) {
        //     //     $user->DOB = $request->input('DOB');
        //     //     $fieldUpdated = true;
        //     // }

        //     // if ($request->has('phoneNumber')) {
        //     //     $user->phoneNumber = $request->input('phoneNumber');
        //     //     $fieldUpdated = true;
        //     // }

        //     // if ($request->has('gender')) {
        //     //     $user->gender = $request->input('gender');
        //     //     $fieldUpdated = true;
        //     // }

        //     // if ($request->has('role')) {
        //     //     $user->role = $request->input('role');
        //     //     $fieldUpdated = true;
        //     // }

        //     $user->save();
        //     return $user;
        // } else {
        //     return response()->json(['message' => 'User not found!'], 404);
        // }

        $user = User::findOrFail($id);

        if ($user) {
            $user->fName = $request->input('fName', 'kamel');
            $user->lName = $request->input('lName', $user->lName);
            $user->email = $request->input('email', $user->email);
            $user->password = $request->input('password', $user->password);
            $user->DOB = $request->input('DOB', $user->DOB);
            $user->phoneNumber = $request->input('phoneNumber', $user->phoneNumber);
            $user->gender = $request->input('gender', $user->gender);
            $user->role = $request->input('role', $user->role);
            $user->isDeleted = $request->input('isDeleted', $user->isDeleted);
            $user->update();
            return $user;
        } else {
            return
                response()->json(['message' => 'User not found!'], 404);
        }
    }

    public function deleteUser(Request $request)
    {
    }
}
