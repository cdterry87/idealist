<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class HistoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_see_their_history()
    {
        $this->signIn();

        $idea = factory('App\Idea')->create();

        $this->post("/favorite/" . $idea->id);
        $this->post("/upvote/" . $idea->id);

        $response = $this->get("/history");

        $this->assertEquals(2, count($response->decodeResponseJson()));
    }
}
