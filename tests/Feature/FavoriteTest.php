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

        $response = json_decode($this->post('/favorite', ['idea_id' => $idea->id])->content());

        $this->assertDatabaseHas('favorites', [
            'user_id' => $idea->user_id,
            'idea_id' => $idea->id
        ]);
    }
}
