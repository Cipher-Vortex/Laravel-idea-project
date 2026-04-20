<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('creating a new idea test_user_can_store_idea_with_image', function () {
    Storage::fake('public');

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/ideas/create', [
        'title' => 'Test Idea',
        'description' => 'Test Description',
        'image_path' => UploadedFile::fake()->image('idea.jpg'),
    ]);

    $response->assertRedirect('/ideas');

    $this->assertDatabaseHas('ideas', [
        'title' => 'Test Idea',
        'description' => 'Test Description',
        'user_id' => $user->id,
    ]);

});
