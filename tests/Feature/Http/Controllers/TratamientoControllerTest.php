<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Tratamiento;
use App\User;

class TratamientoControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_tratamiento_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);

        $tratamiento = factory(Tratamiento::class)->make();
        $data = $tratamiento->attributesToArray();
        $response = $this->post(route('tratamientos.store'), $data);
        $response->assertRedirect(route('tratamientos.index'));
        $response->assertSessionHas('status', 'Tratamiento created!');
    }

    /**
     * @test
     */
    public function it_updates_tratamiento_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $tratamiento = factory(Tratamiento::class)->create();
        $data = factory(Tratamiento::class)->make()->attributesToArray();
        $response = $this->put(route('tratamientos.update', ['tratamiento' => $tratamiento]), $data);
        $response->assertRedirect(route('tratamientos.index'));
        $response->assertSessionHas('status', 'Tratamiento updated!');
    }

    /**
     * @test
     */
    public function it_destroys_tratamiento_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $tratamiento = factory(Tratamiento::class)->create();
        $response = $this->delete(route('tratamientos.destroy', ['tratamiento' => $tratamiento]));
        $response->assertRedirect(route('tratamientos.index'));
        $response->assertSessionHas('status', 'Tratamiento destroyed!');
    }
}
