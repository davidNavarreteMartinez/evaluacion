<?php

use App\Models\Edificio;
use App\Models\Aula;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Forzar migraciones antes de cada test
    $this->artisan('migrate:fresh');
    
    $this->user = \App\Models\User::factory()->create();
    $this->actingAs($this->user);
});

test('un usuario puede agregar un aula a un edificio', function () {
    
    // 1. Arrange (Preparar)
    $edificio = Edificio::factory()->create();
    $aulaData = [
        'nombre' => 'Aula Magna',
        'capacidad' => 150,
    ];

    // 2. Act (Actuar)
    // CORRECCIÓN 1:
    $response = $this->post(route('edificio.aulas.store', $edificio->id), $aulaData);

    // 3. Assert (Afirmar)
    $this->assertDatabaseHas('aulas', [
        'edificio_id' => $edificio->id,
        'nombre' => 'Aula Magna',
        'capacidad' => 150,
    ]);

    $edificio->refresh();
    $this->assertCount(1, $edificio->aulas);
    $this->assertEquals('Aula Magna', $edificio->aulas->first()->nombre);

    // CORRECCIÓN 2:
    $response->assertRedirect(route('edificio.show', $edificio->id));
    
    $response->assertSessionHas('success', 'Aula agregada exitosamente.');
});

test('la validacion falla si no se envia un nombre para el aula', function () {
    
    // 1. Arrange
    $edificio = Edificio::factory()->create();
    $aulaDataInvalida = [
        'nombre' => '', // Nombre vacío
        'capacidad' => 150,
    ];

    // 2. Act
    // CORRECCIÓN 3:
    $response = $this->post(route('edificio.aulas.store', $edificio->id), $aulaDataInvalida);

    // 3. Assert
    $response->assertSessionHasErrors('nombre');
    $this->assertDatabaseMissing('aulas', ['capacidad' => 150]);
    $this->assertCount(0, $edificio->aulas);
});