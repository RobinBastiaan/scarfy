<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddGroupToScarfRequest;
use App\Http\Requests\StoreScarfRequest;
use App\Models\Scarf;
use App\Models\ScarfUsage;
use App\Models\ScoutGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScarfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('scarves.index', [
            'scarves' => Scarf::filter($request)->paginate()->appends(request()->query()),
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
        $validated = $request->validated();

        if ($request->has('image')) {
            $validated += [
                'image_path' => $request->image->extension(),
            ];
        }

        $addedObject = Scarf::create($validated);

        if ($request->has('image')) {
            $newImageName = $addedObject->id . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $newImageName);
        }

        return redirect()->route('scarves.index')
            ->with('success', __('Scarf added successfully! Thanks for the swap ;)'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $scarfId): View
    {
        $scarf = Scarf::with(['scarfUsages.scoutGroup', 'scarfUsages.scarfUsageType'])
            ->findOrFail($scarfId);

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
     * @param \App\Models\Scarf        $scarf
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

    public function addGroup(Scarf $scarf): View
    {
        $scoutGroups = ScoutGroup::all();

        return view('scarves.add-group', compact('scarf', 'scoutGroups'));
    }

    public function submitAddGroup(Scarf $scarf, AddGroupToScarfRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $scarfUsage = new ScarfUsage();
        $scarfUsage->scarf_id = $scarf->id;
        $scarfUsage->scout_group_id = $validated['scout_group_id'];
        $scarfUsage->scarf_usage_type_id = $validated['scarf_usage_type_id'];
        $scarfUsage->introduced_on = $validated['introduced_on'];
        $scarfUsage->used_until = $validated['used_until'];
        $scarfUsage->save();

        return redirect()->route('scarves.show', compact('scarf'))
            ->with('success', __('Scarf usage successfully. Populair scarf indeed!'));
    }
}
