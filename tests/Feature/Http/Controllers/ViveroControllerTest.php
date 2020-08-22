<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Vivero;
use App\User;

class ViveroControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_vivero_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);

        $vivero = factory(Vivero::class)->make();
        $data = $vivero->attributesToArray();
        $response = $this->post(route('viveros.store'), $data);
        $response->assertRedirect(route('viveros.index'));
        $response->assertSessionHas('status', 'Vivero created!');
    }

    /**
     * @test
     */
    public function it_updates_vivero_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $vivero = factory(Vivero::class)->create();
        $data = factory(Vivero::class)->make()->attributesToArray();
        $response = $this->put(route('viveros.update', ['vivero' => $vivero]), $data);
        $response->assertRedirect(route('viveros.index'));
        $response->assertSessionHas('status', 'Vivero updated!');
    }

    /**
     * @test
     */
    public function it_destroys_vivero_and_redirects()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user);
        $vivero = factory(Vivero::class)->create();
        $response = $this->delete(route('viveros.destroy', ['vivero' => $vivero]));
        $response->assertRedirect(route('viveros.index'));
        $response->assertSessionHas('status', 'Vivero destroyed!');
    }
}
