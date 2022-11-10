<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;

beforeEach(function () {
    User::factory(4)->create();
});

test('Login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('Users can authenticate using the login screen', function () {
    $user = User::get()->first();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});

test('Users cannot authenticate with invalid password', function () {
    $user = User::get()->last();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});
