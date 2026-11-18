<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsurePlayerSession;
use App\Models\Player;
use Illuminate\Http\Request;

abstract class Controller
{
    /**
     * The player registered in the current session.
     */
    protected function currentPlayer(Request $request): Player
    {
        return Player::query()->findOrFail($request->session()->get(EnsurePlayerSession::SESSION_KEY));
    }
}
