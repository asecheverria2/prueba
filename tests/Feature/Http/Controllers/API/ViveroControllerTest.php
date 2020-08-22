<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Vivero;
use App\User;
use Laravel\Passport\Passport;

class ViveroControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_vivero_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/viveros']);
        $vivero = factory(Vivero::class)->make();
        $data = $vivero->attributesToArray();
        $response = $this->json('POST','api/viveros',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_vivero_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/viveros']);
        $vivero = factory(Vivero::class)->create();
        $data = factory(Vivero::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/viveros/'.$vivero->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_vivero_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/viveros']);
        $vivero = factory(Vivero::class)->create();
        $response = $this->json('DELETE','api/viveros/'.$vivero->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $vivero->refresh();
        $this->assertSoftDeleted('viveros',['id' => $vivero->id]);

    }
}
