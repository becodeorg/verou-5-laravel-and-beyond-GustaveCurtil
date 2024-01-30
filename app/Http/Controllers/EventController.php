<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function createEvent(Request $request) {

        Event::create([
            'date' => $request->date,
            'time' => $request->time,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect("/");
    }
}
