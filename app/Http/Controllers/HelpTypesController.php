<?php

namespace App\Http\Controllers;

use App\Models\HelpTypes;
use App\Http\Requests\StoreHelpTypesRequest;
use App\Http\Requests\UpdateHelpTypesRequest;

class HelpTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHelpTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHelpTypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HelpTypes  $helpTypes
     * @return \Illuminate\Http\Response
     */
    public function show(HelpTypes $helpTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HelpTypes  $helpTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpTypes $helpTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHelpTypesRequest  $request
     * @param  \App\Models\HelpTypes  $helpTypes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHelpTypesRequest $request, HelpTypes $helpTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HelpTypes  $helpTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(HelpTypes $helpTypes)
    {
        //
    }
}
