<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Eorders;

class EordersTest extends TestCase
{
    /** @test */
    public function the_orders_show_route_can_be_accessed() {
        $this->withoutExceptionHandling();
        
        // Arrange
        $eorder = Eorders::create([
            'name' => 'Billboard Arhelanu przed biurem',
        ]);

        // Act
        $response = $this -> get('/eorders/' . $eorder -> id);
        
        // Assert
        $response -> assertStatus(200)
            ->assertSeeText('Billboard Arhelanu przed biurem');
    }

}
