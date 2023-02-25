<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresectionsRequest;
use App\Http\Requests\UpdatesectionsRequest;
use App\Models\sections;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class SectionsController extends Controller
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
    public function store(StoresectionsRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(sections $sections): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $sections): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesectionsRequest $request, sections $sections): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sections $sections): RedirectResponse
    {
        //
    }
}
