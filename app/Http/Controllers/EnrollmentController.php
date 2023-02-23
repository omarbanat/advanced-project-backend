<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreenrollmentRequest;
use App\Http\Requests\UpdateenrollmentRequest;
use App\Models\enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreenrollmentRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(enrollment $enrollment): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(enrollment $enrollment): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateenrollmentRequest $request, enrollment $enrollment): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(enrollment $enrollment): RedirectResponse
    {
        //
    }
}
