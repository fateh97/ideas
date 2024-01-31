<?php

namespace App\Http\Controllers;

use App\Models\Ideas;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        // dump();
        $idea = Ideas::create([
            'content' => request()->get('idea', ''),
        ]);
        // $idea->save();

        return redirect()->route('dashboard');
    }
}
