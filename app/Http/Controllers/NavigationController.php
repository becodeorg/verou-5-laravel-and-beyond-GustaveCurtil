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

    public function goToEventform() {
        if (auth()->check() == false) {
            return redirect(('/account'));
        } 

        return view('/eventform');
    }

    public function goToAccount() {
        return view('/account');
    }
}
