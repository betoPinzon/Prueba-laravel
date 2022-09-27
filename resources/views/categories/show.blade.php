<x-app-layout>
    <x-slot name="header">
        <h2 class="font-narrow text-2xl text-gray-800 leading-tight">
            {{"Categoría " .ucfirst($categoria->name) }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center">
                    <table class="min-w-max w-full table-auto text-center">
                        <h3 class="mb-4 text-lg text-slate-500 font-bold">Listado de Cursos {{ucfirst($categoria->name)}}</h3>
                        <thead>
                        <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Titulo</th>
                            <th class="py-3 px-6 text-left">Profesor</th>
                            <th class="py-3 px-6 text-left ">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach($categoria->coursers as $curso)
                            <tr class="border-b border-gray-200 hover:bg-gray-200">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <p>{{$curso->name}}</p>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    @if($curso->teacher == null)
                                        <div class="text-red-700 flex items-center font-bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                            </svg>
                                            <p>
                                                Sin Asignar
                                            </p>
                                        </div>
                                    @else
                                        <p class="">{{$curso->teacher->firstname . " ". $curso->teacher->lastname}}</p>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center ">
                                        <a href="{{route('post',$curso->slug)}}"  class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{route('coursers.edit',$curso)}}" class="w-4 mr-2 transform hover:text-green-600 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
{{--                                        <form method="POST" action="{{route('coursers.destroy',$curso)}}" class="w-4 mr-2 transform hover:text-red-600 hover:scale-110 cursor-pointer">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <div class="">--}}
{{--                                                <button type="submit" onclick="return confirm('¿Desea Eliminar el curso?')">--}}
{{--                                                    <svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />--}}
{{--                                                    </svg>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
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
