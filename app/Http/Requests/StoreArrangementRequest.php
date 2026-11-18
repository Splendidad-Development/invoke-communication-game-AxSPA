<?php

namespace App\Http\Requests;

use App\Http\Middleware\EnsurePlayerSession;
use App\Models\Answer;
use App\SymphonyBoard;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreArrangementRequest extends FormRequest
{
    /**
     * Only the player who wrote the answer can submit a board for it.
     */
    public function authorize(): bool
    {
        /** @var Answer $answer */
        $answer = $this->route('answer');

        return $answer->player_id === (int) $this->session()->get(EnsurePlayerSession::SESSION_KEY);
    }

    /**
     * Every slot must hold exactly one image, and every image is used once.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $board = app(SymphonyBoard::class);
        $slotIds = $board->slotIds();

        return [
            'placements' => ['required', 'array', 'size:'.count($slotIds), 'required_array_keys:'.implode(',', $slotIds)],
            'placements.*' => ['required', 'integer', 'between:1,'.count($board->imageIds()), 'distinct'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'placements.*' => 'Place every image in a box before submitting.',
            'placements.*.distinct' => 'Each image can only be used once.',
        ];
    }

    /**
     * @return array<string, int>
     */
    public function placements(): array
    {
        return array_map(intval(...), $this->validated('placements'));
    }
}
