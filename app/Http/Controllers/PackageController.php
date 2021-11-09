<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PackageController extends Controller
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function stripeCheckout()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try {

            // retrieve JSON from POST body

            //


            // Create a PaymentIntent with amount and currency
            header('Content-Type: application/json');
            $paymentIntent = PaymentIntent::create([
                'amount' => 10 * 100,
                'currency' => 'usd',
                'description' => 'Something',
                'payment_method_types' => ['card',],

            ]);
            return response()->json(['clientSecret' => $paymentIntent->client_secret], 200);
        } catch (Error $e) {
            return response()->json(['message' => $e->getMessage], 500);
        }
    }

    public function paypalCheckout()
    {
        try {

            // retrieve JSON from POST body

            //


            return response()->json(['amount' => 10 * 100], 200);
        } catch (Error $e) {
            return response()->json(['message' => $e->getMessage], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
