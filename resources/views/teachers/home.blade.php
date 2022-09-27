<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class=" font-narrow font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Registrar nuevo profesor') }}
            </h2>
            <div class="flex">
                <a href="{{route('dashboard')}}" class="flex items-center mr-5 font-narrow text-white text-lg bg-gray-400 rounded px-2 py-1.5 hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    <p>Regresar</p>
                </a>
                <a href="{{route('teachers.create')}}" class="flex items-center font-narrow text-white text-lg bg-orange-500 rounded px-2 py-1.5 hover:bg-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p class="ml-1">Crear Profesor</p>
                </a>
            </div>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('status'))
                        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="w-full p-5">
                        <table class="min-w-max w-full table-auto">
                            <h3 class="mb-4 text-lg text-slate-500 font-bold">Listado de Cursos</h3>
                            <thead>
                                <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">ID</th>
                                    <th class="py-3 px-6 text-left">Nombre</th>
                                    <th class="py-3 px-6 text-left">Profesión</th>
                                    <th class="py-3 px-6 text-left ">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @foreach($profesores as $profesor)
                                    <tr class="border-b border-gray-200 hover:bg-gray-200">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <p>{{$profesor->id}}</p>
                                        </td>
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <p>{{$profesor->firstname . ' ' . $profesor->lastname}}</p>
                                        </td>
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <p>{{$profesor->profession}}</p>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center ">
                                                <a href="{{route('teachers.show',$profesor)}}" target="_blank" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                                <a href="{{route('teachers.edit',$profesor)}}" class="w-4 mr-2 transform hover:text-green-600 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{route('teachers.destroy',$profesor)}}" class="w-4 mr-2 transform hover:text-red-600 hover:scale-110 cursor-pointer">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="">
                                                        <button type="submit" onclick="return confirm('¿Desea Eliminar el curso?')">
                                                            <svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-5">
                                {{$profesores->links()}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
