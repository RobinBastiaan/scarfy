<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScarfRequest;
use App\Models\Scarf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScarfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('scarves.index', [
            'scarves' => Scarf::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('scarves.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScarfRequest $request): RedirectResponse
    {
        Scarf::create($request->validated());

        return redirect()->route('scarves.index')
            ->with('success', __('Scarf added successfully! Thanks for the swap ;)'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $scarfId): View
    {
        $scarf = Scarf::with('scoutGroups')->findOrFail($scarfId);

        return view('scarves.show', compact('scarf'));
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
