<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Solicitud;
use App\User;
use Laravel\Passport\Passport;

class SolicitudControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_solicitud_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/solicituds']);
        $solicitud = factory(Solicitud::class)->make();
        $data = $solicitud->attributesToArray();
        $response = $this->json('POST','api/solicituds',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_solicitud_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/solicituds']);
        $solicitud = factory(Solicitud::class)->create();
        $data = factory(Solicitud::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/solicituds/'.$solicitud->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_solicitud_api()
    {
        Passport::actingAs(factory(User::class)->create(), ['api/solicituds']);
        $solicitud = factory(Solicitud::class)->create();
        $response = $this->json('DELETE','api/solicituds/'.$solicitud->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $solicitud->refresh();
        $this->assertSoftDeleted('solicituds',['id' => $solicitud->id]);

    }
}
