<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_only_login_users_can_access_contacts()
    {
        $this->seed('RoleSeeder');
        $user = User::factory()->create();
        $response = $this->get('/contacts');
        $response->assertStatus(302);

        $this->actingAs($user);
        $response = $this->get('/contacts');
        $response->assertStatus(200);
    }
}
