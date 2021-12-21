<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->user()->cannot('viewAny', Message::class)) {
            abort(403);
        }

        // Start from here ...

        return Inertia::render('Messages/Index', [
            'messages' => Message::filter($request->all())
                ->sorted()
                ->paginate()
                ->withQueryString(),
            'query'  => $request->all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        if (request()->user()->cannot('view', $message)) {
            abort(403);
        }

        // Start from here ...
        return Inertia::render('Messages/Show', [
            'message' => $message,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
         if (request()->user()->cannot('delete', $message)) {
            abort(403);
        }

        if ($message->delete()) {
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
    public function reply(Request $request, Message $message)
    {

        if (request()->user()->cannot('update', $message)) {
            abort(403);
        }

        // Start from here ...
        $request->validate([
            'reply' => 'required|string|max:2000',
        ]);

        $message->update([
            'reply'    => $request->reply,
            'answered' => true
        ]);

        session()->flash('flash.banner', 'Replied successfully.');
        session()->flash('flash.bannerStyle', 'success');

        return back();
    }


}
