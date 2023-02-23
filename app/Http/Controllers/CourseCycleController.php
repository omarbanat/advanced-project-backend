<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecourseCycleRequest;
use App\Http\Requests\UpdatecourseCycleRequest;
use App\Models\courseCycle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CourseCycleController extends Controller
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
    public function store(StorecourseCycleRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(courseCycle $courseCycle): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(courseCycle $courseCycle): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecourseCycleRequest $request, courseCycle $courseCycle): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(courseCycle $courseCycle): RedirectResponse
    {
        //
    }
}
