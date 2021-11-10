<?php

namespace App\Http\Controllers;

use App\Models\Scarf;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScarfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('scarfs.index', [
            'scarfs' => Scarf::all(),
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
     * @param \App\Models\Scarf $scarf
     */
    public function show(Scarf $scarf): View
    {
        return view('scarf', [
            'scarf' => Scarf::findOrFail($scarf),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Scarf $scarf
     */
    public function edit(Scarf $scarf): View
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Scarf $scarf
     */
    public function update(Request $request, Scarf $scarf): View
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Scarf $scarf
     */
    public function destroy(Scarf $scarf): View
    {
        //
    }
}
