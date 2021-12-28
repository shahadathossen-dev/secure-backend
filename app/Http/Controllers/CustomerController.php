<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Subscription;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('viewAny', Customer::class)) {
            abort(403);
        }
        // Start from here ...
        return Inertia::render('Customers/Index', [
            'customers' => Customer::filter($request->all())
                ->sorted()
                ->paginate()
                ->withQueryString(),
            'query'  => $request->all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Customer $customer)
    {
        // if ($request->user()->cannot('view', $customer)) {
        //     abort(403);
        // }


        // Start from here ...
        return Inertia::render('Customers/Show', [
            'customer' => $customer,
            'subscriptions'     => Subscription::with('package')->where('customer_id', $customer->id)
            ->filter($request->all())
            ->sorted()
            ->paginate()
            ->withQueryString(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request, Customer $customer)
    {
        if ($request->user()->cannot('update', $customer)) {
            abort(403);
        }

        // Start from here ...
        return Inertia::render('Customers/Edit', [
            'customer'  => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Customer $customer)
    {
        if ($request->user()->cannot('update', $customer)) {
            abort(403);
        }

        // Start from here ...
        DB::transaction(function () use ($request, $customer) {
            $customer->update(array_merge(
                $request->only('name', 'email'),
                ['password' => !empty($request->password) ? bcrypt($request->password) : $customer->password]
            ));

            if ($request->has('role')) {
                $customer->syncRoles([$request->role]);
            }
        });

        session()->flash('flash.banner', 'Updated successfully.');
        session()->flash('flash.bannerStyle', 'success');

        if ($request->updateAndContinue) {
            return back();
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Customer $customer)
    {
        if ($request->user()->cannot('delete', $customer)) {
            abort(403);
        }

        DB::transaction(function () use ($request, $customer) {
            $customer->delete();
        });
    }
}
