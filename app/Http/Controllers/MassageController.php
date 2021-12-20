<?php

namespace App\Http\Controllers;

use App\Models\Massage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MassageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->user()->cannot('viewAny', Massage::class)) {
            abort(403);
        }

        // Start from here ...

        return Inertia::render('Massages/Index', [
            'massages' => Massage::filter($request->all())
                ->sorted()
                ->paginate()
                ->withQueryString(),
            'query'  => $request->all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Massage  $massage
     * @return \Illuminate\Http\Response
     */
    public function show(Massage $massage)
    {
        if (request()->user()->cannot('view', $massage)) {
            abort(403);
        }

        // Start from here ...
        return Inertia::render('Massages/Show', [
            'massage' => $massage,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Massage  $massage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Massage $massage)
    {
         if (request()->user()->cannot('delete', $massage)) {
            abort(403);
        }

        if ($massage->delete()) {
            session()->flash('flash.banner', 'Deleted successfully.');
            session()->flash('flash.bannerStyle', 'success');

            return back()->with('status', 'Deleted successfully.');
        }
    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request, Massage $massage)
    {

        if (request()->user()->cannot('update', $massage)) {
            abort(403);
        }

        // Start from here ...
        $request->validate([
            'reply' => 'required|string|max:2000',
        ]);

        $massage->update([
            'reply'    => $request->reply,
            'answered' => true
        ]);

        session()->flash('flash.banner', 'Replied successfully.');
        session()->flash('flash.bannerStyle', 'success');

        return back();
    }


}
