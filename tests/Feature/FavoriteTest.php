<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_favorite_an_idea()
    {
        $this->signIn();

        $idea = factory('App\Idea')->create([
            'user_id' => auth()->id()
        ]);

        $this->post("/favorite/" . $idea->id);

        $this->assertDatabaseHas('favorites', [
            'user_id' => $idea->user_id,
            'idea_id' => $idea->id
        ]);
    }

    /** @test */
    public function a_user_can_dislike_an_idea()
    {
        $this->signIn();

        $favorite = factory('App\Favorite')->create([
            'user_id' => auth()->id()
        ]);

        $this->delete("/favorite/" . $favorite->id);

        $this->assertDatabaseMissing('favorites', $favorite->toArray());
    }

    /** @test */
    public function a_user_can_see_a_list_of_their_favorites()
    {
        $this->signIn();

        $idea = factory('App\Idea')->create();
        $idea2 = factory('App\Idea')->create();
        factory('App\Idea', 5)->create();


        $this->post("/favorite/" . $idea->id);
        $this->post("/favorite/" . $idea2->id);

        $response = $this->get("/favorite");

        $this->assertEquals(2, count($response->decodeResponseJson()));
    }
}
