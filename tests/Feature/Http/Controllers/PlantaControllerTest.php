<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Planta;
use App\User;

class PlantaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_planta_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);

        $planta = factory(Planta::class)->make();
        $data = $planta->attributesToArray();
        $response = $this->post(route('plantas.store'), $data);
        $response->assertRedirect(route('plantas.index'));
        $response->assertSessionHas('status', 'Planta created!');
    }

    /**
     * @test
     */
    public function it_updates_planta_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $planta = factory(Planta::class)->create();
        $data = factory(Planta::class)->make()->attributesToArray();
        $response = $this->put(route('plantas.update', ['planta' => $planta]), $data);
        $response->assertRedirect(route('plantas.index'));
        $response->assertSessionHas('status', 'Planta updated!');
    }

    /**
     * @test
     */
    public function it_destroys_planta_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $planta = factory(Planta::class)->create();
        $response = $this->delete(route('plantas.destroy', ['planta' => $planta]));
        $response->assertRedirect(route('plantas.index'));
        $response->assertSessionHas('status', 'Planta destroyed!');
    }
}
