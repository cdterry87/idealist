<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_users_top_list_can_include_favorites()
    {
        $this->signIn();

        $ideas = factory('App\Idea', 10)->create();
        $ideas2 = factory('App\Idea', 10)->create();

        $ideas->each(function ($item, $key) {
            $this->post('/favorite/' . $item->id);
        });

        $this->signIn();

        $ideas2->each(function ($item, $key) {
            $this->post('/favorite/' . $item->id);
        });

        $response = $this->get('/top')->decodeResponseJson();

        $totalFavorites = 0;

        foreach ($response as $index => $item) {
            if (!is_null($item['user_favorite'])) {
                $totalFavorites++;
            }
        }

        $this->assertEquals(10, $totalFavorites);
    }

    /** @test */
    public function a_signed_in_user_can_upvote_an_idea()
    {
        $this->signIn();

        $idea = factory('App\Idea')->create();
        factory('App\Idea', 20)->create();

        $this->post('/upvote/' . $idea->id);

        $idea2 = Idea::where(['id' => $idea->id])->first();

        $this->assertEquals(1, $idea2->votes);

        $this->assertDatabaseHas('votes', [
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
        ]);
    }

    /** @test */
    public function a_signed_in_user_can_downvote_an_idea()
    {
        $this->signIn();

        $idea = factory('App\Idea')->create();

        $this->post('/downvote/' . $idea->id);

        $idea = Idea::where(['id' => $idea->id])->first();

        $this->assertEquals(-1, $idea->votes);

        $this->assertDatabaseHas('votes', [
            'idea_id' => $idea->id,
            'user_id' => auth()->id(),
        ]);
    }
}
