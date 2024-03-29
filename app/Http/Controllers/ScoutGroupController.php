<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScoutGroupRequest;
use App\Models\ScoutGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ScoutGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $scoutGroups = ScoutGroup::with('currentScarfUsage.scarf')
            ->filter($request)
            ->paginate()
            ->appends(request()->query());

        return view('groups.index', [
            'groups' => $scoutGroups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScoutGroupRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $scoutGroup = ScoutGroup::create($validated);

        $this->invalidateScoutGroupCaches();

        return redirect()->route('groups.show', $scoutGroup->name)
            ->with('success', __('Scouting Group added successfully. Scouting is everywhere!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $scoutGroupSlug): View
    {
        /** @var ScoutGroup $group */
        $group = ScoutGroup::with(['association', 'scarfUsages.scarf', 'scarfUsages' => function ($q) {
            $q->orderBy('used_until')->orderBy('scarf_usage_type_id');
        }])
            ->where('slug', $scoutGroupSlug)
            ->withoutGlobalScope('hasScarfUsages')
            ->firstOrfail();
        $neighboringGroups = ScoutGroup::neighboringGroups($group)->get();

        return view('groups.show', compact(['group', 'neighboringGroups']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScoutGroup $scoutGroup): View
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScoutGroup $scoutGroup): View
    {
        //

        $this->invalidateScoutGroupCaches();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScoutGroup $scoutGroup): View
    {
        //

        $this->invalidateScoutGroupCaches();
    }

    protected function invalidateScoutGroupCaches(): void
    {
        Cache::forget('totalScoutGroups');
        Cache::forget('recentAdditions');
    }
}
