<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class Meme extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowAnonymus()
    {
    	$response = $this->get('/memes');
    	$response->assertStatus(302)
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowUser()
    {
    	$user = factory(User::class)->create()''
    	$response = $this->actingAs($user)->withSession(['Foo' => 'bar'])->get('/memes');
    	$response->assertStatus(200);
    
    }

     /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddAnonymus()
    {
    	$user = factory(User::class)->create()''
    	$response = $this->get('add');
    	$response->assertStatus(200);
    
    }
}
