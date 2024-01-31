<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NavigationController extends Controller
{
    public function goToHome(){
        //Indien de site voor het eerst wordt bezocht in de huidige week, dan doet ie deze WebScraping -> database (laadt wat langer). Ander gaat ie gewoon verder gelijk gewoon
        if (!Cache::has('scheduled_task_last_run_week')) {
            
            app()->call([app(ScraperController::class), 'scrapeKask']);

            Cache::put('scheduled_task_last_run_week', now()->weekOfYear, now()->endOfWeek());
        }

        $events = Event::all();
        $user = Auth::user();
        return view('/home', ['events' => $events, 'user' => $user]);
    }

    public function goToEventCreate() {
        if (auth()->check() == false) {
            return redirect(('/account'));
        } 

        return view('/event-create');
    }

    public function goToAccount() {
        $events = Event::where('user_id', auth()->id())->get();

        $user = User::find(Auth::id());
        $saves = $user->saves ?? [];

        $savedEvents = [];
        foreach ($saves as $save) {
            $event = Event::where('id', $save)->get();
            array_push($savedEvents, $event);
        }
        
        return view('/account', ['events' => $events, 'saves' => $savedEvents[0]]);
    }

    public function goToEventEdit(Event $event) {
        if (auth()->check() == false) {
            return redirect(('/account'));
        } 

        return view('/event-edit', ['event' => $event]);
    }
}
