<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Intérpretes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('interpreters.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                        Nuevo Intérprete
                    </a>
                </div>

                <div class="p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($interpreters as $interpreter)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $interpreter->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $interpreter->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <!-- Agrega aquí los enlaces para editar y eliminar -->
                                        <div class="flex items-center space-x-4">
                                            <a href="{{ route('interpreters.edit', $interpreter) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                                                @if (optional($interpreter->tracks)->isEmpty())
                                                    <form action="{{ route('interpreters.destroy', $interpreter) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este intérprete?')">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                                    </form>
                                                @else
                                                    <span class="text-gray-400 ml-4 ">No se puede eliminar</span>
                                                @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
