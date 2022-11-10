<?php

use App\Models\User;

beforeEach(function () {
    User::factory()->create();
});

test('Confirm password screen can be rendered', function () {
    $user = User::get()->last();

    $response = $this->actingAs($user)->get('/confirm-password');

    $response->assertStatus(200);
});

test('Password can be confirmed', function () {
    $user = User::get()->last();

    $response = $this->actingAs($user)->post('/confirm-password', [
        'password' => 'password',
    ]);

    $response->assertRedirect()
        ->assertSessionHasNoErrors();
});

test('Password is not confirmed with invalid password', function () {

    $user = User::get()->last();

    $response = $this->actingAs($user)->post('/confirm-password', [
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors();
});
