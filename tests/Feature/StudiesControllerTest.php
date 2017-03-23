<?php

namespace Tests\Feature;


use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudiesControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test StudiesControllerTest.
     *
     * @return void
     */
    public function testIndex()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get('studies');
    }
}
