<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Idea;

class IdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_signed_in_user_can_create_ideas()
    {
        $this->signIn();

        $attributes = [
            'idea' => 'Something overthought and underdone'
        ];

        $this->post('/idea', $attributes);

        $this->assertDatabaseHas('ideas', $attributes);
    }

    /** @test */
    public function a_guest_cannot_create_an_idea()
    {
        $attributes = [
            'idea' => 'Something overthought and underdone'
        ];

        $this->post('/idea', $attributes)->assertStatus(302);
        $this->assertDatabaseMissing('ideas', $attributes);
    }

    /** @test */
    public function a_signed_in_user_can_view_their_own_ideas()
    {
        $this->signIn();

        factory('App\Idea', 3)->create(['user_id' => auth()->id()]);

        $response = $this->get('/ideas/my');

        $this->assertEquals(3, $response->getOriginalContent()->count());
    }
}
