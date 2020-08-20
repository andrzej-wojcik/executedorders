<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Eorders;

class EordersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_orders_show_route_can_be_accessed() {
        // $this->withoutExceptionHandling();
        
        // Arrange
         $eorder = Eorders::create([
            'name' => 'Billboard Arhelan',
            'discription' => 'Billboard Arhelanu przed biurem w Bielsku Podlaskim',
        ]);

        // Act
        $response = $this -> get('/eorders/' . $eorder -> id);
        
        // Assert
        $response -> assertStatus(200)
            ->assertSeeText('Billboard Arhelan');
    }

    /** @test */
    public function the_discription_is_shown_on_the_eorders_show_view(){

        $eorder = Eorders::create([
            'name' => 'Billboard Arhelan',
            'discription' => 'Billboard Arhelanu przed biurem w Bielsku Podlaskim',
        ]);

        $response = $this -> get('/eorders/' . $eorder -> id);

        $response->assertSeeText('Billboard Arhelanu przed biurem w Bielsku Podlaskim');
    }

}
