<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Solicitud;
use App\User;

class SolicitudControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_solicitud_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);

        $solicitud = factory(Solicitud::class)->make();
        $data = $solicitud->attributesToArray();
        $response = $this->post(route('solicituds.store'), $data);
        $response->assertRedirect(route('solicituds.index'));
        $response->assertSessionHas('status', 'Solicitud created!');
    }

    /**
     * @test
     */
    public function it_updates_solicitud_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $solicitud = factory(Solicitud::class)->create();
        $data = factory(Solicitud::class)->make()->attributesToArray();
        $response = $this->put(route('solicituds.update', ['solicitud' => $solicitud]), $data);
        $response->assertRedirect(route('solicituds.index'));
        $response->assertSessionHas('status', 'Solicitud updated!');
    }

    /**
     * @test
     */
    public function it_destroys_solicitud_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $solicitud = factory(Solicitud::class)->create();
        $response = $this->delete(route('solicituds.destroy', ['solicitud' => $solicitud]));
        $response->assertRedirect(route('solicituds.index'));
        $response->assertSessionHas('status', 'Solicitud destroyed!');
    }
}
