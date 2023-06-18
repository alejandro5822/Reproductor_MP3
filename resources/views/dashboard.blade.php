<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            <a href="{{ route('tracks.index') }}" class="bg-blue-500 rounded px-4 py-2">Lista de Canciones</a>
            <a href="{{ route('interpreters.index') }}" class="bg-blue-500 rounded px-4 py-2">Lista de Interpretes</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
