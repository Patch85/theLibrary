<?php

it('has holdings page', function () {
    $response = $this->get('/holdings');

    $response->assertStatus(200);
});
