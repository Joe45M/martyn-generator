<?php

test('Socialite redirects to github', function () {
    $this->get(route('socialite.github'))
        ->assertStatus(302);
});

