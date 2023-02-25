<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreassignmentsRequest;
use App\Http\Requests\UpdateassignmentsRequest;
use App\Models\assignments;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AssignmentsController extends Controller
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
    public function store(StoreassignmentsRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(assignments $assignments): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(assignments $assignments): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateassignmentsRequest $request, assignments $assignments): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(assignments $assignments): RedirectResponse
    {
        //
    }
}
