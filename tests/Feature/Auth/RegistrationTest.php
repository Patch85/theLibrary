<?php

use App\Providers\RouteServiceProvider;

test('The registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('New users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});
