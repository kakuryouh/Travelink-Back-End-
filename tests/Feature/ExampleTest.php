<?php

it('returns a successful response', function () {
    $response = $this->get('dashboard.view');

    $response->assertStatus(200);
});
