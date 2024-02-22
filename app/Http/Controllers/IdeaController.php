<?php

namespace App\Http\Controllers;

use App\Models\Ideas;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Ideas $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        $idea = Ideas::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function edit(Ideas $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Ideas $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $idea->update($validated);

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea updated successfully!');
    }

    public function destroy($idea)
    {
        // where id=1;
        Ideas::where('id', $idea)->firstOrFail()->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
