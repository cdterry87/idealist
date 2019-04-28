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

        $response = $this->post('/idea', $attributes);

        $this->assertDatabaseHas('ideas', $attributes);
    }

    /** @test */
    public function a_guest_cannot_create_an_idea()
    {
        $attributes = [
            'idea' => 'Something overthought and underdone'
        ];

        $response = $this->post('/idea', $attributes);

        $this->assertDatabaseMissing('ideas', $attributes);
    }

    /** @test */
    public function a_signed_in_user_can_upvote_an_idea()
    {
        $this->signIn();

        $attributes = [
            'idea' => 'Something overthought and underdone'
        ];

        $ideaId = json_decode($this->post('/idea', $attributes)
            ->getContent())
            ->id;

        $this->post('/upvote/' . $ideaId);

        $idea = Idea::where(['id' => $ideaId])->first();

        $this->assertEquals(1, $idea->votes);

        $this->assertDatabaseHas('votes', [
            'idea_id' => $ideaId,
            'user_id' => auth()->id(),
        ]);
    }

    /** @test */
    public function a_signed_in_user_can_downvote_an_idea()
    {
        $this->signIn();

        $attributes = [
            'idea' => 'Something overthought and underdone'
        ];

        $ideaId = json_decode($this->post('/idea', $attributes)
            ->getContent())
            ->id;

        $this->post('/downvote/' . $ideaId);

        $idea = Idea::where(['id' => $ideaId])->first();

        $this->assertEquals(-1, $idea->votes);

        $this->assertDatabaseHas('votes', [
            'idea_id' => $ideaId,
            'user_id' => auth()->id(),
        ]);
    }

    /** @test */
    public function a_signed_in_user_can_view_their_own_ideas()
    {
        $this->signIn();

        $attributes = [
            'idea' => 'Something overthought and underdone'
        ];

        $this->post('/idea', $attributes);
        $this->post('/idea', $attributes);
        $this->post('/idea', $attributes);

        $response = $this->get('/ideas/my');

        $this->assertEquals(3, $response->getOriginalContent()->count());
    }
}
