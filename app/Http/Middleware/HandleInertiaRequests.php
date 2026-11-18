<?php

namespace App\Http\Middleware;

use App\Models\Arrangement;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'auth' => [
                'user' => $request->user(),
            ],
            'leaderboard' => Inertia::optional(fn (): array => $this->leaderboard($request)),
        ];
    }

    /**
     * Every submitted board, best first. Only loaded when a page asks for it (partial reload).
     *
     * @return list<array{id: int, playerId: int, name: string, group: int, score: int, pattern: string, mine: bool}>
     */
    protected function leaderboard(Request $request): array
    {
        $currentPlayerId = $request->session()->get(EnsurePlayerSession::SESSION_KEY);

        return Arrangement::query()
            ->with('player:id,name')
            ->ranked()
            ->limit(500)
            ->get()
            ->map(fn (Arrangement $arrangement): array => [
                'id' => $arrangement->id,
                'playerId' => $arrangement->player_id,
                'name' => $arrangement->player->name,
                'group' => $arrangement->group,
                'score' => $arrangement->score,
                'pattern' => $arrangement->pattern,
                'mine' => $arrangement->player_id === $currentPlayerId,
            ])
            ->all();
    }
}
