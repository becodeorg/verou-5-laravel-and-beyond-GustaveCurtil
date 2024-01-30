<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function createEvent(Request $request) {
        $inputs = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'title' => 'required',
            'description' => 'required',
        ]);

        $inputs['title'] = strip_tags($inputs['title']); //tegen lastige injecties enzu
        $inputs['description'] = strip_tags($inputs['desctription']);
        $inputs['user_id'] = auth()->id();

        Event::create($inputs);

        return redirect("/");
    }

    public function editEvent(Event $event, Request $request) {
        $inputs = $request->validate([
            'date' => 'required',
            'time' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $inputs['title'] = strip_tags($inputs['title']); //tegen lastige injecties enzu
        $inputs['description'] = strip_tags($inputs['description']);

        $event->update($inputs);

        return redirect('/account');
    }

    public function deleteEvent($id) {
        return $id;
    }
}
