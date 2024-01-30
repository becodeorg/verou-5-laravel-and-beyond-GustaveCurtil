<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function goToHome(){
        $events = Event::all();

        return view('/home', ['events' => $events]);
    }

    public function goToEventCreate() {
        if (auth()->check() == false) {
            return redirect(('/account'));
        } 

        return view('/event-create');
    }

    public function goToAccount() {
        $events = Event::where('user_id', auth()->id())->get();
        return view('/account', ['events' => $events]);
    }

    public function goToEventEdit(Event $event) {
        if (auth()->check() == false) {
            return redirect(('/account'));
        } 

        return view('/event-edit', ['event' => $event]);
    }
}
