<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            Editar Canción
        </h2>
    </x-slot>

    <div class="mt-6">
        <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            <form action="{{ route('tracks.update', $track->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Título:</label>
                    <input type="text" name="title" id="title" value="{{ $track->title }}" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
