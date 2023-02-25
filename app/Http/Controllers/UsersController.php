<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreusersRequest;
use App\Http\Requests\UpdateusersRequest;
use App\Models\users;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UsersController extends Controller
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
    public function store(StoreusersRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(users $users): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(users $users): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateusersRequest $request, users $users): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(users $users): RedirectResponse
    {
        //
    }
}
