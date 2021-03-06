<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Eorders;
use App\User;

class EordersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_orders_show_route_can_be_accessed() {
        // $this->withoutExceptionHandling();
        
        // Arrange
        $eorder = factory(Eorders::class)->create([
            'name' => 'Billboard Arhelan',
        ]);
        
        // Act
        $response = $this -> get('/eorders/' . $eorder -> id);
        
        // Assert
        $response -> assertStatus(200)
            ->assertSeeText('Billboard Arhelan');
    }

    /** @test */
    public function the_discription_is_shown_on_the_eorders_show_view(){

        $eorder = factory(Eorders::class)->create([
            'discription' => 'Billboard Arhelanu przed biurem w Bielsku Podlaskim',
        ]);

        $response = $this -> get('/eorders/' . $eorder -> id);

        $response->assertSeeText('Billboard Arhelanu przed biurem w Bielsku Podlaskim');
    }
    
    /** @test */
    public function en_eorder_can_be_created(){
        // $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->actingAs($user)->post('/eorders',[
            'name' => 'Billboard Arhelan',
            'discription' => 'Billboard Arhelanu przed biurem w Bielsku Podlaskim',
        ]);

        $this->assertDatabaseHas('eorders',[
            'user_id' => $user->id,
            'name' => 'Billboard Arhelan',
            'discription' => 'Billboard Arhelanu przed biurem w Bielsku Podlaskim',
        ]);
    }
}
