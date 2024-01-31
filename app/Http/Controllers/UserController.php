<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function createAccount(Request $request) {
        $inputs = $request->validate([
            'name' => 'required|min:3', Rule::unique('users', 'name'), 
            'password' => 'required|min:5', 
            'password-check' => 'required|min:5'
        ]);

        if ($inputs['password'] !== $inputs['password-check']) {
            return redirect('/account');
        } else {
            $inputs['password'] = bcrypt($inputs['password']);
            $user = User::create($inputs);
            auth()->login($user);

            return redirect('/account');
        }
    }
    public function login(Request $request) {
        $input = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['name' => $input['name'], 'password' => $input['password']])) {
            $request->session()->regenerate();
        }
        return redirect('/account'); 
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function saveEvent(Event $event) {
        $user = User::find(Auth::id());
        $saves = $user->saves ?? [];
        if (empty($saves)) {
            $saves = [$event->id];
        } else {
            array_push($saves, $event->id);
        };

        $user->saves = $saves;
        $user->save();
        $user->refresh();

        return redirect('/');
    }
}
