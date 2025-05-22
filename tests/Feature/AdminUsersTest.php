<?php

use App\Livewire\Admin\AdminUsers;
use App\Models\User;
use Livewire\Livewire;

test('Component renders', function () {

    User::factory()->createMany(20);


    Livewire::test(AdminUsers::class)->assertStatus(200);
});
