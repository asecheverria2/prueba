<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Tratamiento;
use App\User;
use Laravel\Passport\Passport;

class TratamientoControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_tratamiento_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/tratamientos']);
        $tratamiento = factory(Tratamiento::class)->make();
        $data = $tratamiento->attributesToArray();
        $response = $this->json('POST','api/tratamientos',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_tratamiento_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/tratamientos']);
        $tratamiento = factory(Tratamiento::class)->create();
        $data = factory(Tratamiento::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/tratamientos/'.$tratamiento->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_tratamiento_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/tratamientos']);
        $tratamiento = factory(Tratamiento::class)->create();
        $response = $this->json('DELETE','api/tratamientos/'.$tratamiento->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $tratamiento->refresh();
        $this->assertSoftDeleted('tratamientos',['id' => $tratamiento->id]);

    }
}
