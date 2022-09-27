<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-narrow font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Agregar Categoría') }}
        </h2>
    </x-slot>

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
                                </div>
                            </div>
                        </div>
                        <div class="flex font-narrow justify-between px-4 py-2 text-right sm:px-6 -mt-5">
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-orange-500 py-1 px-4 text-sm font-medium text-white shadow-sm hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
