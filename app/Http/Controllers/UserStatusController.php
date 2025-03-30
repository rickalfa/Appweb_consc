<?php

namespace App\Http\Controllers;

use App\Models\user_status;
use App\Http\Requests\Storeuser_statusRequest;
use App\Http\Requests\Updateuser_statusRequest;

class UserStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeuser_statusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user_status $user_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user_status $user_status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateuser_statusRequest $request, user_status $user_status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user_status $user_status)
    {
        //
    }
}
