<?php

use App\SymphonyBoard;
use Database\Factories\ArrangementFactory;

it('has 25 slots in board order', function () {
    $slotIds = app(SymphonyBoard::class)->slotIds();

    expect($slotIds)->toHaveCount(25)
        ->and($slotIds[0])->toBe('unmet-0')
        ->and(end($slotIds))->toBe('teae-0');
});

it('scores a perfect board as 25 with an all-correct pattern', function () {
    $result = app(SymphonyBoard::class)->score(ArrangementFactory::perfectPlacements());

    expect($result)->toBe(['score' => 25, 'pattern' => str_repeat('1', 25)]);
});

it('marks the slots holding wrong images in the pattern', function () {
    $placements = ArrangementFactory::perfectPlacements();
    [$placements['unmet-0'], $placements['rtb-0']] = [$placements['rtb-0'], $placements['unmet-0']];

    $result = app(SymphonyBoard::class)->score($placements);

    expect($result['score'])->toBe(23)
        ->and($result['pattern'][0])->toBe('0')
        ->and($result['pattern'][3])->toBe('0');
});

it('accepts the disease control images in any order within their own side', function () {
    $placements = ArrangementFactory::perfectPlacements();
    [$placements['dc1-0'], $placements['dc1-2']] = [$placements['dc1-2'], $placements['dc1-0']];
    [$placements['dc2-0'], $placements['dc2-1']] = [$placements['dc2-1'], $placements['dc2-0']];

    expect(app(SymphonyBoard::class)->score($placements)['score'])->toBe(25);
});

it('marks disease control images placed on the wrong side as wrong', function () {
    $placements = ArrangementFactory::perfectPlacements();
    [$placements['dc1-0'], $placements['dc2-2']] = [$placements['dc2-2'], $placements['dc1-0']];

    expect(app(SymphonyBoard::class)->score($placements)['score'])->toBe(23);
});

it('builds the correct arrangement, keeping the boxes the player got right', function () {
    $board = app(SymphonyBoard::class);
    $placements = ArrangementFactory::perfectPlacements();
    [$placements['ctrl-0'], $placements['ctrl-1']] = [$placements['ctrl-1'], $placements['ctrl-0']];
    [$placements['dc1-0'], $placements['dc2-2']] = [$placements['dc2-2'], $placements['dc1-0']];

    $solution = $board->solution($placements);

    expect(array_keys($solution))->toBe($board->slotIds())
        ->and($board->score($solution)['score'])->toBe(25)
        ->and($solution['ctrl-0'])->toBe($placements['ctrl-0'])
        ->and($solution['dc1-1'])->toBe($placements['dc1-1'])
        ->and($solution['dc1-0'])->toBe(7)
        ->and($solution['dc2-2'])->toBe(12);
});

it('leaves the correct answers out of the client layout', function () {
    $layout = app(SymphonyBoard::class)->layout();

    expect(json_encode($layout))->not->toContain('answers')
        ->and(collect($layout)->flatMap(fn (array $column) => collect($column['rows'])->flatten(1)->pluck('slots')->flatten()))->toHaveCount(25);
});
