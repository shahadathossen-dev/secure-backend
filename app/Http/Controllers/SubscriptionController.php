<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->user()->cannot('viewAny', Subscription::class)) {
            abort(403);
        }

        // Start from here ...
        return Inertia::render('Subscriptions/Index', [
            'subscriptions' => Subscription::with('customer', 'package')
            ->filter($request->all())
                ->sorted()
                ->paginate()
                ->withQueryString(),
            'query'  => $request->all(),
        ]);
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
        return Inertia::render('Subscriptions/Show', [
            'subscription'=> $subscription->load('customer', 'package')
        ]);
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
