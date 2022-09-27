<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class=" font-narrow font-semibold text-2xl text-gray-800 leading-tight">
                    Datos del Curso
                </h2>
            </div>
            <div class="flex">
                <a href="{{route('coursers.index')}}" class="h-10 flex items-center font-narrow text-white text-lg bg-slate-400 rounded px-2 py-1.5 hover:bg-slate-500 mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    <p>Regresar</p>
                </a>
                <button form="courser_form" type="submit" class=" h-10 flex items-center font-narrow text-white text-lg bg-orange-500 rounded px-2 py-1.5 hover:bg-orange-600 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    <p>Guardar</p>
                </button>
            </div>

        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Cursos</h3>
                                    <p class="mt-1 text-sm text-gray-600">Esta es la información a editar del curso.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">
                                <form id="courser_form"
                                      action="{{route('coursers.store')}}"
                                      method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-6">
                                                    <label for="name" class="block text-sm font-medium text-gray-700">Titulo del curso</label>
                                                    <div class="flex items-center text-red-600">
                                                        @error('name')
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                        </svg>
                                                        <p class="font-bold text-xs">{{'El título es obligatorio'}}</p>
                                                        @enderror
                                                    </div>
                                                    <input type="text" name="name" id="name" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                            </div>
                                            <div>
                                                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                                                <div class="flex items-center text-red-600">
                                                    @error('description')
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                    </svg>
                                                    <p class="font-bold text-xs">{{'Descripción obligatoria'}}</p>
                                                    @enderror
                                                </div>
                                                <div class="mt-1">
                                                    <textarea id="description" name="description" rows="12" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Imagen del curso</label>
                                                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                                    <div class="space-y-1 text-center">
                                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <div class="flex text-sm text-gray-600">
                                                            <label for="file" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                                                <span>Upload a file</span>
                                                                <input id="file" name="file" type="file" class="not-sr-only">
                                                            </label>
                                                        </div>
                                                        <p class="text-xs text-gray-500">PNG, JPG, GIF (max 10MB)</p>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 mt-5 sm:col-span-3">
                                                    <label for="teacher_id" class="block text-sm font-medium text-gray-700">Profesor del curso</label>
                                                    <select id="teacher_id" name="teacher_id" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                        <option value="" selected disabled hidden>Escoger Profesor</option>
                                                        <option value="">Sin asignar - Profesor</option>
                                                        @foreach($teachers as $teacher)
                                                            <option value="{{$teacher->id}}">{{ucfirst($teacher->firstname . " " . $teacher->lastname)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-span-6 mt-5 sm:col-span-3">
                                                    <label for="category_id" class="block text-sm font-medium text-gray-700">Categorías</label>
                                                    <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                        <option value="" selected disabled hidden>Escoger Categoría</option>
                                                        <option value="">Sin asignar - Categoría</option>
                                                    @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex font-narrow justify-between px-4 py-3 text-right sm:px-6">
                                            <a href="{{route('coursers.index')}}" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-1 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Volver</a>
                                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-orange-500 py-1 px-4 text-sm font-medium text-white shadow-sm hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Guardar</button>
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
