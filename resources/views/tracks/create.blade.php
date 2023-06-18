<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            Registrar nueva Canción
        </h2>
    </x-slot>

    <div class="mt-6">
        <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            <form action="{{ route('tracks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Título:</label>
                    <input type="text" name="title" id="title" placeholder="Título" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="music" class="block text-gray-700 font-semibold mb-2">Archivo de música:</label>
                    <input type="file" name="music" id="music" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                    @error('music')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="interpreter" class="block text-gray-700 font-semibold mb-2">Intérprete:</label>
                    <select name="interpreter" id="interpreter" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                        @foreach ($interpreters as $interpreter)
                            <option value="{{ $interpreter->id }}">{{ $interpreter->name }}</option>
                        @endforeach
                    </select>
                    @error('interpreter')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-md px-4 py-2">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
