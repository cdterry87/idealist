<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Idea;

class NewIdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_idea_can_be_created()
    {
        $this->signIn();

        $attributes = [
            'idea' => 'Something overthought and underdone'
        ];

        $response = $this->post('/idea', $attributes);

        $idea = Idea::where($attributes)->first();

        $this->assertDatabaseHas('ideas', $attributes);
    }
}
