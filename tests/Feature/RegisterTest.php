<?php

test('Smoke: register renders', function () {
    $response = $this->get(route('register'));

    $response->assertStatus(200);
});
