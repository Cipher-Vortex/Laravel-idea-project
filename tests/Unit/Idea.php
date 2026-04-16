<?php

use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
test('it belongs to a User', function () {
    // expect(true)->toBeTrue();
    $idea = Idea::factory()->create();

    expect($idea->user)->toBeInstanceOf((User::class));

});
test('it can be null', function () {
    // expect(true)->toBeTrue();
    $idea = Idea::factory()->create();

    expect($idea->steps)->toBeEmpty();

});
