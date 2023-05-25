<?php

use App\Models\Collection;

it('has a Name', function (Collection $collection) {
    expect($collection->name)->toBeString();
})->with('collections');

it('has collections page', function () {
    $response = $this->get('/collections');

    $response->assertStatus(200);
})->todo();

it("has a User's collections page", function () {
    $response = $this->get('/user/collections');

    $response->assertStatus(200);
})->todo();
