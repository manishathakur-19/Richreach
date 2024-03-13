<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class BlogControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateBlog()
    {
        // Create a user for testing
        $user = User::factory()->create();
        $this->actingAs($user); // Log in the user

        $response = $this->post('/addblog', [
            'title' => 'Test Blog',
            'content' => 'This is a test blog content.',
        ]);

        $response->assertStatus(302); // Assuming a successful creation redirects to another page
        $this->assertDatabaseHas('posts', ['title' => 'Test Blog']);
    }

    public function testEditBlog()
    {
        // Create a user for testing
        $user = User::factory()->create();
        $this->actingAs($user); // Log in the user

        // Create a blog post for testing
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->post("/editblog/{$post->id}", [
            'title' => 'Updated Test Blog',
            'content' => 'This is an updated test blog content.',
        ]);

        $response->assertStatus(302); // Assuming a successful edit redirects to another page
        $this->assertDatabaseHas('posts', ['title' => 'Updated Test Blog']);
    }

    public function testDeleteBlog()
    {
        // Create a user for testing
        $user = User::factory()->create();
        $this->actingAs($user); // Log in the user

        // Create a blog post for testing
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->delete("/deleteBlog/{$post->id}");

        $response->assertStatus(302); // Assuming a successful deletion redirects to another page
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
