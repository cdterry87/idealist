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
        $idea = factory('App\Idea')->create();
        
        $user = User::find($idea->user_id);
        Auth::login($user);

        $this->post("/favorite/" . $idea->id);

        $this->assertDatabaseHas('favorites', [
            'user_id' => $idea->user_id,
            'idea_id' => $idea->id
        ]);
    }

    /** @test */
    public function a_user_can_dislike_an_idea()
    {
        $idea = factory('App\Idea')->create();
        
        $user = User::find($idea->user_id);
        Auth::login($user);

        $response = $this->post("/favorite/" . $idea->id);
        
        $favorite = json_decode($response->content(), true);

        $this->delete("/favorite/" . $favorite['id']);

        $this->assertDatabaseMissing('favorites', $favorite);
    }
}
