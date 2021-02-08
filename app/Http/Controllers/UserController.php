<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $backgroundColor = $user->background_color;
        $textColor = $user->text_color;
        $links = $user->links()->get(['id', 'name', 'link', 'created_at']);

        return view('users.show',[
            'backgroundColor' => $backgroundColor,
            'textColor' => $textColor,
            'links' => $links
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedRequest = $request->validate([
            'background-color' => ['required', 'size:7', 'starts_with:#'],
            'text-color' => ['required', 'size:7', 'starts_with:#']
        ]);

        if (Auth::id() !== $user->id) {
            return abort(403);
        }

        Auth::user()->update([
            'background_color' => $validatedRequest['background-color'],
            'text_color' => $validatedRequest['text-color']
        ]);

        return redirect()->back()->with(['success' => 'Changes saved successfully.']);
    }
}
