<?php

namespace App\Http\Controllers;

use App\Models\ScoutGroup;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScoutGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('groups.index', [
            'groups' => ScoutGroup::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request): View
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ScoutGroup $scoutGroup
     */
    public function show(ScoutGroup $scoutGroup): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ScoutGroup $scoutGroup
     */
    public function edit(ScoutGroup $scoutGroup): View
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ScoutGroup $scoutGroup
     */
    public function update(Request $request, ScoutGroup $scoutGroup): View
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ScoutGroup $scoutGroup
     */
    public function destroy(ScoutGroup $scoutGroup): View
    {
        //
    }
}
