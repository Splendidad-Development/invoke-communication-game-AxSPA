<?php

test('returns a successful response', function () {
    $response = $this->get(route('game.welcome'));

    $response->assertOk();
});
