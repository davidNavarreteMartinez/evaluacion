<x-mi-layout>
    
    <h1>Crear Nueva Aula</h1>
    <form action="{{ route('aula.update', $aula) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="edificio_id">Edificio:</label>
            <select id="edificio_id" name="edificio_id" required>
                @foreach ($edificios as $edificio)
                    <option
                        value="{{ $edificio->id }}"
                        @selected($aula->edificio_id == $edificio->id)
                    >
                        {{ $edificio->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="numero">Número de Aula:</label>
            <input type="text" id="numero" name="numero" value="{{ $aula->numero ?? old('numero') }}" required>
        </div>
        <div>
            <label for="capacidad">Capacidad:</label>
            <input type="number" id="capacidad" name="capacidad" value="{{ $aula->capacidad ?? old('capacidad') }}" required>
        </div>
        <button type="submit">Guardar</button>
    </form>
</x-mi-layout>
