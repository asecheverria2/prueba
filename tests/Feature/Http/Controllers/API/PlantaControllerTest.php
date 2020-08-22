<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Planta;
use App\User;
use Laravel\Passport\Passport;

class PlantaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_planta_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/plantas']);
        $planta = factory(Planta::class)->make();
        $data = $planta->attributesToArray();
        $response = $this->json('POST','api/plantas',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_planta_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/plantas']);
        $planta = factory(Planta::class)->create();
        $data = factory(Planta::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/plantas/'.$planta->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_planta_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/plantas']);
        $planta = factory(Planta::class)->create();
        $response = $this->json('DELETE','api/plantas/'.$planta->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $planta->refresh();
        $this->assertSoftDeleted('plantas',['id' => $planta->id]);

    }
}
