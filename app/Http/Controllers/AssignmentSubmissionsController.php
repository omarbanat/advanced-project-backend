<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreassignmentSubmissionsRequest;
use App\Http\Requests\UpdateassignmentSubmissionsRequest;
use App\Models\assignmentSubmissions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AssignmentSubmissionsController extends Controller
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
    public function store(StoreassignmentSubmissionsRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(assignmentSubmissions $assignmentSubmissions): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(assignmentSubmissions $assignmentSubmissions): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateassignmentSubmissionsRequest $request, assignmentSubmissions $assignmentSubmissions): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(assignmentSubmissions $assignmentSubmissions): RedirectResponse
    {
        //
    }
}
