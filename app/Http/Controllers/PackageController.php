<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Package;
use App\Models\Category;
use App\Enums\PackageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('viewAny', Package::class)) {
            abort(403);
        }

        // Start from here ...
        return Inertia::render('Packages/Index', [
            'packages' => Package::filter($request->all())
                ->sorted()
                ->paginate()
                ->withQueryString(),
            'query'  => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Package::class)) {
            abort(403);
        }

        // Start from here ...
        return Inertia::render('Packages/Create', [
            'categories' => Category::all(),
            'packageTypes' => PackageType::toSelectOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PackageRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PackageRequest $request)
    {
        if ($request->user()->cannot('create', Package::class)) {
            abort(403);
        }

        // Start from here ...
        $package = DB::transaction(function () use ($request) {
            return Package::create($request->only('name', 'category_id', 'type', 'price', 'features'));
        });

        session()->flash('flash.banner', 'Package created successfully.');
        session()->flash('flash.bannerStyle', 'success');

        if ($request->saveAndContinue) {
            return back();
        }
        return redirect()->route('packages.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request, Package $package)
    {
        if ($request->user()->cannot('update', $package)) {
            abort(403);
        }

        // Start from here ...
        return Inertia::render('Packages/Edit', [
            'product' => $package,
            'categories' => Category::all(),
            'packageTypes' => PackageType::toSelectOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PackageRequest  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PackageRequest $request, Package $package)
    {
        if ($request->user()->cannot('update', $package)) {
            abort(403);
        }

        // Start from here ...
        $package = DB::transaction(function () use ($request, $package)  {
            return $package->update($request->only('name', 'category_id', 'type', 'price', 'features'));
        });

        session()->flash('flash.banner', 'Updated successfully.');
        session()->flash('flash.bannerStyle', 'success');

        if ($request->updateAndContinue) {
            return back();
        }
        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Package $package)
    {
        if ($request->user()->cannot('delete', $package)) {
            abort(403);
        }

        // Start from here ...
        if ($package->subscriptions()->exists()) {
            $subscriptions = $package->subscriptions()->count();
            session()->flash('flash.banner', "There are {$subscriptions} subscriptions related to it. You can not delete it now.");
            session()->flash('flash.bannerStyle', 'danger');
        } else {
            if ($package->delete()) {
                session()->flash('flash.banner', 'Deleted successfully.');
                session()->flash('flash.bannerStyle', 'success');
            }
        }
        return back();
    }
}
