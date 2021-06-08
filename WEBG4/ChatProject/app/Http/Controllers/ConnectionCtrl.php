<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckConnection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectionCtrl extends Controller {
    public function index() {
        return view("connection");
    }

    public function authenticate(CheckConnection $request): RedirectResponse {
        $credentials = $request->only('login');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/channels');
        }

        return back()->withErrors([
            'login' => "Aucune donnée n'a été trouvée avec les informations indiquées.",
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
