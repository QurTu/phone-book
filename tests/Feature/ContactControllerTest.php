<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;


    public function test_users_can_create_contacts() {
        $this->withoutExceptionHandling();
        $this->seed('RoleSeeder');
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/add-contact', [
            'name' => 'Jonas',
            'phone' => '+3701111125'
        ]);

        $response->assertStatus(302);
        $contact = Contact::where('user_id', $user->id)->first();
        $this->assertEquals('Jonas', $contact->name);
        $this->assertEquals('+3701111125', $contact->phone);
        $this->assertEquals($user->id , $contact->user_id);

    }
}
