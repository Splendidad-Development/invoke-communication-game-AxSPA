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

it('accepts any disease control image in either disease control section', function () {
    $placements = ArrangementFactory::perfectPlacements();
    [$placements['dc1-0'], $placements['dc2-2']] = [$placements['dc2-2'], $placements['dc1-0']];

    expect(app(SymphonyBoard::class)->score($placements)['score'])->toBe(25);
});

it('leaves the correct answers out of the client layout', function () {
    $layout = app(SymphonyBoard::class)->layout();

    expect(json_encode($layout))->not->toContain('answers')
        ->and(collect($layout)->flatMap(fn (array $column) => collect($column['rows'])->flatten(1)->pluck('slots')->flatten()))->toHaveCount(25);
});
