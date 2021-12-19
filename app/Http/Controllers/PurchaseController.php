<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        if (request()->user()->cannot('viewAny', Purchase::class)) {
            abort(403);
        }

        // Start from here ...
        return Inertia::render('Purchases/Index', [
            'purchases' => Purchase::with('customer', 'package')
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
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        if (request()->user()->cannot('view', $purchase)) {
            abort(403);
        }

        // Start from here ...
        return Inertia::render('Purchases/Show', [
            'purchase'=> $purchase->load('customer', 'package')
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
         if (request()->user()->cannot('update', $purchase)) {
            abort(403);
        }

        // Start from here ...
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
         if (request()->user()->cannot('delete', $purchase)) {
            abort(403);
        }

        // Start from here ...
    }
}
