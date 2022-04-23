<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoteRequest;
use App\Models\Vote;
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
     * Store a newly created resource in storage.
     */
    public function store(StoreVoteRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // validate the IP address contained inside the request
        // only for positive votes, because they do not hold additional information
        if ($validated['is_good']) {
            $similarVoteExists = Vote::query()
                ->whereIp($request->ip())
                ->whereIsGood($request->is_good)
                ->whereVoteableId($request->voteable_id)
                ->whereVoteableType($request->voteable_type)
                ->exists();

            if ($similarVoteExists) {
                return redirect()->back()
                    ->withErrors(['message1' => __('You have already voted here')]);
            }
        }

        // Get the current users IP address and add it to the request
        $validated['ip'] = $request->ip();

        Vote::create($validated);

        return redirect()->back()
            ->with('success', __('Vote added. You adhered to the rule to always leave the campground cleaner than you found it.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vote $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vote $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\StoreVoteRequest $request
     * @param \App\Models\Vote                    $vote
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVoteRequest $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vote $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
