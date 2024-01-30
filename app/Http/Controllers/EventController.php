<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function createEvent(Request $request) {
        $inputs = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $inputs['user_id'] = auth()->id();

        Event::create($inputs);

        return redirect("/");
    }
}
