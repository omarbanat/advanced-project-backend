<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecoursesRequest;
use App\Http\Requests\UpdatecoursesRequest;
use App\Models\courses;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CoursesController extends Controller
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
    public function store(StorecoursesRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(courses $courses): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(courses $courses): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecoursesRequest $request, courses $courses): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(courses $courses): RedirectResponse
    {
        //
    }
}
