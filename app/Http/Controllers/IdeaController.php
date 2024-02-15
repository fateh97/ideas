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
            'idea' => 'required|min:3|max:240'
        ]);

        $idea = Ideas::create([
            'content' => request()->get('idea', ''),
        ]);
        //$idea->save();

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function destroy($idea)
    {
        // where id=1;
        Ideas::where('id', $idea)->firstOrFail()->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
