<?php

use App\Models\User;

test('Dashboard redirects unauthenticated users', function () {
    $response = $this->get(route('admin.dashboard'));

    $response->assertStatus(302);
});

test('Dashboard redirects unauthorized users', function () {
    $response = $this->actingAs(User::factory()->create())
        ->get(route('admin.dashboard'));
    $response->assertStatus(302);
});

test('Dashboard allows authorized users', function () {
    $response = $this->actingAs(User::factory()->make([
        'is_admin' => true,
    ]))
        ->get(route('admin.dashboard'));
    $response->assertStatus(200);
});
