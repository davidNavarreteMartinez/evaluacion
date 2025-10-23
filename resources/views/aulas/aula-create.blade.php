<x-mi-layout>
    
    <h1>Crear Nueva Aula</h1>
    <form action="{{ route('aula.store') }}" method="POST">
        @csrf
        <div>
            <label for="edificio_id">Edificio:</label>
            <select id="edificio_id" name="edificio_id" required>
                @foreach ($edificios as $edificio)
                    <option value="{{ $edificio->id }}">{{ $edificio->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="numero">Número de Aula:</label>
            <input type="text" id="numero" name="numero" required>
        </div>
        <div>
            <label for="capacidad">Capacidad:</label>
            <input type="number" id="capacidad" name="capacidad" required>
        </div>
        <button type="submit">Crear Aula</button>
    </form>
</x-mi-layout>
