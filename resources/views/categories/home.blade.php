<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-narrow font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Agregar Categoría') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white ">
                    @if (session('status'))
                        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mt-10 sm:mt-0 ">
                        <div class="md:grid md:grid-cols-3 md:gap-6 ">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-narrow leading-6 text-slate-500 text-2xl font-bold">Agregar Categoría</h3>
                                </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">
                                <form action="{{route('categories.store')}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="overflow-hidden shadow-lg sm:rounded-md">
                                        <div class="px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="name" class="block text-lg text-gray-700 font-narrow">Categoría</label>
                                                    <input value="" type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    <div class="flex  items-center text-red-600">
                                                        @error('name')
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                        </svg>
                                                        <p class="font-bold text-xs">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex font-narrow justify-between px-4 py-2 text-right sm:px-6 -mt-5">
                                            <a href="{{route('dashboard')}}" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-1 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Volver</a>
                                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-orange-500 py-1 px-4 text-sm font-medium text-white shadow-sm hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Agregar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-10 w-full p-5 border-t border-gray-200">
                    <table class="min-w-max w-full table-auto">
                        <h3 class="font-narrow mb-4 text-lg text-slate-500 font-bold">Listado de Categorías</h3>
                        <thead>
                        <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Creación</th>
                            <th class="py-3 px-6 text-left">Nombre</th>
                            <th class="py-3 px-6 text-center ">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach($categories as $category)
                        <tr class="border-b border-gray-200 hover:bg-gray-200">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <p>{{$category->created_at->format('d M Y')}}</p>
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <p>{{ucfirst($category->name)}}</p>
                            </td>
                            <td class="py-3 px-6 text-center text-center">
                                <div class="flex item-center justify-center ">
                                    <a href="{{route('categories.show',$category)}}"  class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{route('categories.edit',$category) }}" class="w-4 mr-2 transform hover:text-green-600 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{route('categories.destroy',$category)}}" class="w-4 mr-2 transform hover:text-red-600 hover:scale-110 cursor-pointer">
                                        @csrf
                                        @method('DELETE')
                                        <div class="">
                                            <button type="submit" onclick="return confirm('¿Desea eliminar la categoría?')">
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
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
