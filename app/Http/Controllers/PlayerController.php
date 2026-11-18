<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EnsurePlayerSession;
use App\Http\Requests\StorePlayerRequest;
use App\Models\Player;
use Illuminate\Http\RedirectResponse;

class PlayerController extends Controller
{
    public function store(StorePlayerRequest $request): RedirectResponse
    {
        $player = Player::query()->create($request->validated());

        $request->session()->regenerate();
        $request->session()->put(EnsurePlayerSession::SESSION_KEY, $player->id);

        return redirect()->route('game.groups');
    }
}
