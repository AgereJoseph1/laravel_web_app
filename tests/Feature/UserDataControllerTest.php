<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;


class UserDataControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetUserById()
    {
        // Create a test user
        $user = User::factory()->create();

        // Send a request to the endpoint with the user's ID
        $response = $this->get('/api/v1/public/users/' . $user->id);

        // Assert that the response is successful
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['user' => ['id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at']])
            ->assertJson(['user' => $user->toArray()]);
    }

    public function testGetAllUsers()
    {
        // Create 5 test users
        $users = User::factory()->count(5)->create();

        // Send a request to the endpoint
        $response = $this->get('/api/v1/public/users');

        // Assert that the response is successful
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['users', 'pagination'])
            ->assertJsonCount(5, 'users')
            ->assertJson(['users' => $users->toArray()]);
    }

    public function testGetAllUsersWithPagination()
    {
        // Create 15 test users
        User::factory()->count(15)->create();

        // Send a request to the endpoint with pagination
        $response = $this->get('/api/v1/public/users?per_page=10');

        // Assert that the response is successful
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['users', 'pagination'])
            ->assertJsonCount(10, 'users')
            ->assertJson(['pagination' => [
                'per_page' => 10,
                'current_page' => 1,
                'total' => 15,
            ]]);
    }
    
}
