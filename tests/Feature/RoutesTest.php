<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest  extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
    }
    
    public function testVideosPage()
    {
        $response = $this->get('/videos');

        $response->assertStatus(200);
    }
    
    public function testVideosAddPage()
    {
        $response = $this->get('/videos/add');

        $response->assertStatus(200);
    }
    
    public function testVideosLikedPage()
    {
        $response = $this->get('/videos/liked');

        $response->assertStatus(200);
    }
    
    public function testMetaDataKeywordAddPage()
    {
        $response = $this->get('/metadata/keywords/add');

        $response->assertStatus(200);
    }
    
    public function testMetaDataLocationKeywordListPage()
    {
        $response = $this->get('/metadata');

        $response->assertStatus(200);
    }
    
    public function testMetaDataLocationAddPage()
    {
        $response = $this->get('/metadata/locations/add');

        $response->assertStatus(200);
    }
    
    
}


