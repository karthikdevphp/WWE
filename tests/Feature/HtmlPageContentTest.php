<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class htmlPageContentTest  extends TestCase{
    
    
     public function testWelcomePage(){
         $response = $this->get('/');
         $this->assertContains('WWE DEMO PROJECT',
                    $response->getContent(),
                    'HTML SHOULD HAVE WELCOME'
                    );
                 
     }
     
     public function testVideosPage(){
         $response = $this->get('/videos');
         $this->assertContains('Videos',
                    $response->getContent(),
                    'HTML SHOULD HAVE Videos'
                    );
                 
     }
     
     public function testAddVideosPage(){
         $response = $this->get('/videos/add');
         $this->assertContains('Add Video',
                    $response->getContent(),
                    'HTML SHOULD HAVE Add Videos'
                    );
                 
     }
     
     public function testLikedVideosPage(){
         $response = $this->get('/videos/liked');
         $this->assertContains('Liked Videos',
                    $response->getContent(),
                    'HTML SHOULD HAVE Liked Videos'
                    );
                 
     }
     
     public function testListMetaDataPage(){
         $response = $this->get('/metadata');
         $this->assertContains('Metadata',
                    $response->getContent(),
                    'HTML SHOULD HAVE Metadata'
                    );
                 
     }
    
}
