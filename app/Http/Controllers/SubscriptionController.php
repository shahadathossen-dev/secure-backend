<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->user()->cannot('viewAny', Subscription::class)) {
            abort(403);
        }

        // Start from here ...
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->user()->cannot('create', Subscription::class)) {
            abort(403);
        }

        // Start from here ...
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request()->user()->cannot('create', Subscription::class)) {
            abort(403);
        }

        // Start from here ...
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        if (request()->user()->cannot('view', $subscription)) {
            abort(403);
        }

        // Start from here ...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
         if (request()->user()->cannot('update', $subscription)) {
            abort(403);
        }

        // Start from here ...
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
         if (request()->user()->cannot('update', $subscription)) {
            abort(403);
        }

        // Start from here ...
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
         if (request()->user()->cannot('delete', $subscription)) {
            abort(403);
        }

        // Start from here ...
    }
}
