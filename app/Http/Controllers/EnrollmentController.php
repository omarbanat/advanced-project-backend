<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{
    public function addEnrollment(Request $request)
    {
        $rules = [
            'cancelled' => 'required|string|max:5',
            'cancellationReason' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $enrollment = Enrollment::create($request->all());

        if ($enrollment->save()) {
            return response()->json(['message' => 'User enrolled to course successfully'], 201);
        } else {
            return response()->json(['message' => 'Unable to enroll user to this course'], 500);
        }

        try {
            Enrollment::create([]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Unable to enroll!',
                'error' => $th
            ]);
        }
    }
}
