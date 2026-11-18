<?php

namespace App\Http\Middleware;

use App\Models\Player;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sends visitors back to the name screen until they have registered as a player in this session.
 */
class EnsurePlayerSession
{
    public const SESSION_KEY = 'player_id';

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $playerId = $request->session()->get(self::SESSION_KEY);

        if ($playerId === null || ! Player::query()->whereKey($playerId)->exists()) {
            $request->session()->forget(self::SESSION_KEY);

            return redirect()->route('game.welcome');
        }

        return $next($request);
    }
}
