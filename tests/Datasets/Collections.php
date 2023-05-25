<?php

use App\Models\Collection;

dataset('collections', function () {
    return [
        Collection::factory()->create([
            'name' => 'Sci-Fi',
            'description' => ['My favorite science fiction books, movies and tv shows'],
        ]),
        Collection::factory()->create([
            'name' => 'Books',
            'description' => ['All of my books'],
        ]),
    ];
});
