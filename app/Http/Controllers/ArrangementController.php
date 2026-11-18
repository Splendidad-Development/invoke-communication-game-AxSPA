<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArrangementRequest;
use App\Models\Answer;
use App\Models\Arrangement;
use App\SymphonyBoard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class ArrangementController extends Controller
{
    /**
     * Score the submitted board on the server and save it with the player's order of images.
     */
    public function store(StoreArrangementRequest $request, SymphonyBoard $board, Answer $answer): RedirectResponse
    {
        $placements = $request->placements();

        $arrangement = $answer->arrangements()->create([
            'player_id' => $answer->player_id,
            'group' => $answer->group,
            'placements' => $placements,
            ...$board->score($placements),
        ]);

        return redirect()->route('arrangements.show', $arrangement);
    }

    public function show(Request $request, SymphonyBoard $board, Arrangement $arrangement): Response
    {
        abort_unless($arrangement->player_id === $this->currentPlayer($request)->id, 403);

        return BoardController::render($board, $arrangement->answer, $arrangement);
    }
}
