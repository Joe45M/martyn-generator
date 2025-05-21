<?php

use App\Livewire\AssignRepo;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

test('has results property', function () {

    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(AssignRepo::class)->assertViewHas('results', null);
});

test('has searchResults property', function () {

    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(AssignRepo::class)->assertViewHas('searchResults', null);
});


test('has query property', function () {

    $user = User::factory()->create();

    $this->actingAs($user);

    Livewire::test(AssignRepo::class)->assertViewHas('query', null);
});
