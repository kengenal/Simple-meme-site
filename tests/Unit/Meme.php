<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Meme extends TestCase
{
    *
     * A basic test example.
     *
     * @return void
     
    public function testShowMeme()
    {
    	$response = $this->get('/memes');
    	$response->assertStatus(302);
        //$this->assertTrue(true);
    }
}
