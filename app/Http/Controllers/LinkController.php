<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\StoreLinkRequest;
use Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.links.index', ['links' => Auth::user()->links()->withCount('visits')->with('latest_visit')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLinkRequest $storeLinkRequest)
    {
        $link = Auth::user()->links()->create($storeLinkRequest->validated());

        if ($link) {
            return redirect()->route('dashboard.links.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(403);
        }

        return view('dashboard.links.edit', ['link' => $link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLinkRequest $request, Link $link)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(403);
        }

        $link->update($request->only('name', 'link'));

        return redirect()->route('dashboard.links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(403);
        }

        $link->delete();

        return redirect()->route('dashboard.links.index');
    }
}
