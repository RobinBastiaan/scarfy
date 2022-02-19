<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Http\Requests\StoreVoteRequest;
use Illuminate\Http\RedirectResponse;

class VoteController extends Controller
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
     */
    public function store(StoreVoteRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Vote::create($validated);

        return redirect()->back()
            ->with('success', __('Vote added. You adhered to the rule to always leave the campground cleaner than you found it.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreVoteRequest  $request
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVoteRequest $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
