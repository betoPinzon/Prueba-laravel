<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-narrow font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Actualizar Categoría') }}
        </h2>
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
                    <div class="mt-10 sm:mt-0 ">
                        <div class="md:grid md:grid-cols-3 md:gap-6 ">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-narrow leading-6 text-slate-500 text-2xl font-bold">Actualizar Categoría</h3>
                                </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">
                                <form action="{{route('categories.update',$category)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="overflow-hidden shadow-lg sm:rounded-md">
                                        <div class="px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="name" class="block text-lg text-gray-700 font-narrow">Categoría</label>
                                                    <input value="{{$category->name}}" type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
                                            <a href="{{route('categories.index')}}" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-1 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Volver</a>
                                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-orange-500 py-1 px-4 text-sm font-medium text-white shadow-sm hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Agregar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
