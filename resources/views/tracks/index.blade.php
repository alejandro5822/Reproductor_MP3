<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">
                Listado de Canciones
            </h2>
            <a href="{{ route('tracks.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2">
                Nueva Canción
            </a>
        </div>   
    </x-slot>
    
    <div class="mt-6">
        <div class="grid grid-cols-4 gap-4">
            @if (session('error'))
                <p class="text-red-500">{{ session('error') }}</p>
            @endif

            @if ($tracks->isEmpty())
                <p class="text-gray-500">No hay canciones disponibles.</p>
            @else
                @foreach ($tracks as $track)
                    <div class="rounded bg-blue-200 p-4">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">{{ $track->title }}</h3>
                            <p class="text-gray-600">{{ $track->path }}</p>
                        </div>
                        <div class="flex justify-end mt-4">
                            <a href="{{ route('tracks.play', $track->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2 mr-2">
                                Reproducir
                            </a>
                            <a href="{{ route('tracks.edit', $track->id) }}" class="bg-gray-500 hover:bg-gray-600 text-white rounded px-4 py-2 mr-2">
                                Editar
                            </a>
                            <form action="{{ route('tracks.destroy', $track) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta canción?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded px-4 py-2">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
