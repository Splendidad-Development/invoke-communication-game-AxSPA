<?php

namespace App\Models;

use Database\Factories\ArrangementFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * A submitted symphony board: which image the player put in each slot, and how it scored.
 *
 * @property int $id
 * @property int $player_id
 * @property int $answer_id
 * @property int $group
 * @property array<string, int> $placements
 * @property string $pattern One character per slot in board order: "1" correct, "0" wrong.
 * @property int $score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['player_id', 'answer_id', 'group', 'placements', 'pattern', 'score'])]
class Arrangement extends Model
{
    /** @use HasFactory<ArrangementFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'group' => 'integer',
            'placements' => 'array',
            'score' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<Player, $this>
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    /**
     * @return BelongsTo<Answer, $this>
     */
    public function answer(): BelongsTo
    {
        return $this->belongsTo(Answer::class);
    }

    /**
     * Highest score first; ties go to whoever finished first.
     *
     * @param  Builder<Arrangement>  $query
     */
    public function scopeRanked(Builder $query): void
    {
        $query->orderByDesc('score')->orderBy('created_at')->orderBy('id');
    }
}
