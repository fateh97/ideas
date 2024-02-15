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
        request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $idea = Ideas::create([
            'content' => request()->get('content', ''),
        ]);
        //$idea->save();

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function edit(Ideas $idea)
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Ideas $idea)
    {
        request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea updated successfully!');
    }

    public function destroy($idea)
    {
        // where id=1;
        Ideas::where('id', $idea)->firstOrFail()->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
