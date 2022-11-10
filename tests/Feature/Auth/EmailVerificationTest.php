<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;

beforeEach(function () {
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);
});

test('Email verification screen can be rendered', function () {
    $user = User::get()->last();

    $response = $this->actingAs($user)->get('/verify-email');

    $response->assertStatus(200);
});

test('Email can be verified', function () {
    $user = User::get()->last();

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    $response = $this->actingAs($user)->get($verificationUrl);

    Event::assertDispatched(Verified::class);

    $this->assertTrue($user->fresh()->hasVerifiedEmail());
    $response->assertRedirect(RouteServiceProvider::HOME . '?verified=1');
});

test('Email is not verified with invalid hash', function () {
    $user = User::get()->last();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($user)->get($verificationUrl);

    $this->assertFalse($user->fresh()->hasVerifiedEmail());
});
