<?php

namespace Tests\Feature;

use App\Models\Aprendiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AprendizCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_raiz_redirecciona_a_aprendices(): void
    {
        $response = $this->get('/');
        $response->assertRedirect('/aprendices');
    }

    public function test_index_muestra_listado_paginado(): void
    {
        Aprendiz::factory()->count(15)->create();

        $response = $this->get('/aprendices');
        $response->assertStatus(200);
        $response->assertViewIs('aprendices.index');
        $response->assertSee('Listado de Aprendices');
    }

    public function test_filtro_por_nombre_o_documento(): void
    {
        Aprendiz::factory()->create([
            'nombre' => 'Carlos Andrés Pérez',
            'documento' => '1099887766',
        ]);
        Aprendiz::factory()->create([
            'nombre' => 'María Camila Gómez',
            'documento' => '1022334455',
        ]);

        $response = $this->get('/aprendices?q=Carlos');
        $response->assertStatus(200);
        $response->assertSee('Carlos Andrés Pérez');
        $response->assertDontSee('María Camila Gómez');

        $responseDoc = $this->get('/aprendices?q=1022334455');
        $responseDoc->assertStatus(200);
        $responseDoc->assertSee('María Camila Gómez');
        $responseDoc->assertDontSee('Carlos Andrés Pérez');
    }

    public function test_create_muestra_formulario(): void
    {
        $response = $this->get('/aprendices/create');
        $response->assertStatus(200);
        $response->assertViewIs('aprendices.create');
        $response->assertSee('Nuevo Aprendiz');
    }

    public function test_store_guarda_aprendiz_valido(): void
    {
        $data = [
            'nombre' => 'Brayan Nicolás Gómez Tovar',
            'documento' => '1012351439',
            'correo' => 'bryan.gomez@sena.edu.co',
            'ficha_id' => 3412785,
        ];

        $response = $this->post('/aprendices', $data);

        $response->assertRedirect('/aprendices');
        $response->assertSessionHas('ok', 'Aprendiz creado');
        $this->assertDatabaseHas('aprendices', [
            'documento' => '1012351439',
            'correo' => 'bryan.gomez@sena.edu.co',
        ]);
    }

    public function test_store_falla_con_mensajes_en_espanol(): void
    {
        $response = $this->post('/aprendices', []);

        $response->assertSessionHasErrors([
            'nombre' => 'El nombre es obligatorio.',
            'documento' => 'El documento es obligatorio.',
            'correo' => 'El correo es obligatorio.',
        ]);
    }

    public function test_edit_muestra_formulario_precargado(): void
    {
        $aprendiz = Aprendiz::factory()->create([
            'nombre' => 'Laura Sofía Castro',
            'documento' => '1033445566',
            'correo' => 'laura@ejemplo.com',
        ]);

        $response = $this->get("/aprendices/{$aprendiz->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('aprendices.edit');
        $response->assertSee('Laura Sofía Castro');
        $response->assertSee('1033445566');
    }

    public function test_update_actualiza_y_conserva_unique_propio(): void
    {
        $aprendiz = Aprendiz::factory()->create([
            'nombre' => 'Juan Diego Ríos',
            'documento' => '1055667788',
            'correo' => 'juan@ejemplo.com',
            'ficha_id' => 3412785,
        ]);

        // Actualizamos sólo el nombre, manteniendo documento y correo iguales
        $updateData = [
            'nombre' => 'Juan Diego Ríos Morales',
            'documento' => '1055667788',
            'correo' => 'juan@ejemplo.com',
            'ficha_id' => 3412785,
        ];

        $response = $this->put("/aprendices/{$aprendiz->id}", $updateData);

        $response->assertRedirect('/aprendices');
        $response->assertSessionHas('ok', 'Aprendiz actualizado');
        $this->assertDatabaseHas('aprendices', [
            'id' => $aprendiz->id,
            'nombre' => 'Juan Diego Ríos Morales',
        ]);
    }

    public function test_update_falla_si_documento_ya_existe_en_otro(): void
    {
        $aprendiz1 = Aprendiz::factory()->create(['documento' => '1000000001', 'correo' => 'u1@test.com']);
        $aprendiz2 = Aprendiz::factory()->create(['documento' => '1000000002', 'correo' => 'u2@test.com']);

        // Intentamos asignarle al aprendiz2 el documento del aprendiz1
        $response = $this->put("/aprendices/{$aprendiz2->id}", [
            'nombre' => 'Aprendiz Duplicado',
            'documento' => '1000000001',
            'correo' => 'u2_nuevo@test.com',
        ]);

        $response->assertSessionHasErrors([
            'documento' => 'El documento ya existe.',
        ]);
    }

    public function test_destroy_elimina_registro(): void
    {
        $aprendiz = Aprendiz::factory()->create();

        $response = $this->delete("/aprendices/{$aprendiz->id}");

        $response->assertRedirect('/aprendices');
        $response->assertSessionHas('ok', 'Aprendiz eliminado');
        $this->assertDatabaseMissing('aprendices', [
            'id' => $aprendiz->id,
        ]);
    }
}
