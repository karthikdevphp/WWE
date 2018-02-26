<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Video;
use App\Keyword;
use App\Location;

class SeedDataTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    
    public function testVideoUploadedTest()
    {
        $videos = new Video();
        $this->assertTrue( count($videos->all()) >= 1,"It should have atlest one video already Uploaded");
    }
    
    public function testLocationsSeededTest()
    {
        $locations = new Location();
        $this->assertTrue( count($locations->all()) >= 1,"It should have atlest one Location already inserted");
    }
    
    public function testKeywordsSeededTest()
    {
        $keywords = new Keyword();
        $this->assertTrue( count($keywords->all()) >= 1,"It should have atlest one keyword already inserted");
    }
    
}