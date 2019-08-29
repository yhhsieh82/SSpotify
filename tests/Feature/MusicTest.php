<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MusicTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /** @test */
    public function a_user_can_create_a_music(){
        //$this->withoutExceptionHandling();
        //Given an authenticated user
        $user = factory('App\User')->create();
        $this->actingAs($user);
        //When he hit the end point /musics to create a music
        $this->post('/musics', [ 'name' => 'name', 'description' => 'description']);
        //Then the db should store a music record in musics table
        $this->assertDatabaseHas('musics',  [ 'name' => 'name', 'description' => 
            'description']);
    }

    /** @test */
    public function a_user_can_update_a_music(){
        $this->withoutExceptionHandling();
        //Given an authenticated user
        $user = factory('App\User')->create();
        $this->actingAs($user);
        //When he hit the end point /musics/{id} to update the music 
        $this->patch('/musics/2', ['name'=> 'new_name', 'description'=>'new_description']);
        //Then the DB should renew the record
        $this->assertDatabaseHas('musics', ['name'=>'new_name', 'description'=>'new_description']);
    }

    /* @test *//*
    public function guest_may_not_create_a_music(){

    }*/
}
