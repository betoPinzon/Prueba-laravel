@extends('layouts.template')
@section('contentIndex')
<!--Template-->
<div class="lg:grid lg:grid-rows-1 lg:grid-cols-4 lg:gap-4">
    <!--Section Img/Autor/Similares-->
    <div class="flex flex-col lg:col-span-3">
        <!--Img-->
        <div class="w-full h-[380px] bg-center bg-cover" style="background-image: url({{$course->get_image}})">
        </div>
        <h1 class="font-narrow font-bold text-4xl mt-2.5 ml-2.5 tracking-wide">{{$course->name}}</h1>
        <p class="mt-2.5 ml-3 font-narrow text-lg leading-6 text-slate-700">{{$course->description}}</p>
        <!--Autor-->
        <div class="ml-2.5 relative flex items-center mt-5 bottom-2 ">
            @if(!empty($course->teacher))
                @if(!$course->teacher->image == null)
                    <img class="border border-gray-400 w-[55px] h-[55px]] rounded-full" src="{{$course->teacher->get_image}}" alt="">
                @else
                    <div class=" bg-slate-300  w-[55px] h-[55px] rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>

                    </div>
                @endif
                <div class="ml-2.5 flex justify-between items-center w-full">
                    <div class="flex flex-col">
                        <p>{{$course->teacher->firstname  . " " . $course->teacher->lastname}}</p>
                        <p class="font-narrow -mt-2 text-slate-500">{{$course->created_at->diffForHumans()}}</p>
                    </div>
                    @if(!$course->category == null)
                    <p class="bg-blue-200 rounded text-center px-2 font-narrow text-sm">{{$course->category->name}}</p>
                    @else
                    <p class="bg-red-500 rounded text-center px-2 font-narrow text-sm text-white">Sin categoría</p>
                    @endif
                </div>
            @else
                <div class="flex w-full justify-between">
                    <p class="bg-red-500 rounded px-2 font-narrow text-white text-sm">Profesor no asignado</p>
                    <p class="bg-red-500 rounded text-center px-2 font-narrow text-sm text-white">Sin categoría</p>
                </div>
            @endif
        </div>
        <!--Similares-->
        <div class="hidden lg:block order-5 ml-2.5 mt-12">
            <h3 class="text-center font-narrow font-bold text-4xl mb-8 tracking-wide">Cursos Similares</h3>
            <div class="grid grid-cols-3 gap-8">
                @foreach($course->similar() as $similar)
                    @if ($similar->id !== $course->id)
                        <div class="card-course">
                            <a class="" href="{{route('post',$similar->slug)}}">
                                <div class="w-full h-[300px] bg-center bg-cover" style="background-image: url({{$similar->get_image}})">
                                </div>
                                <h2 class="font-bold text-xl text-slate-500 my-2.5 ml-2.5 leading-5">{{$similar->name}}</h2>
                                <h3 class="ml-2.5 mt-1 leading-4">{{$similar->extracto}}</h3>
                                <div class="relative flex items-center justify-between mt-5 pl-2.5 bottom-2">
                                    <div class="flex flex items-center">
                                        @if(!$similar->teacher == null)
                                            @if(!$similar->teacher->image == null)
                                                <img class="w-[30px] h-[30px]] rounded-full" src="{{$similar->teacher->get_image}}" alt="">
                                            @else
                                                <div class="w-[30px] h-[30px] rounded-full bg-gray-500 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" text-white w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                    </svg>
                                                </div>
                                            @endif
                                                <p class="ml-3">{{$similar->teacher->lastname ." ". $similar->teacher->firstname}}</p>
                                        @endif
                                    </div>
                                    @if(!$similar->category == null)
                                        <p class="bg-blue-200 rounded px-1 mr-2.5">{{ucfirst($similar->category->name)}}</p>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!--Contenido Curso-->
    <div class="">
        <ul class="bg-[#edf1f5] border boder-[#e6ebf1] font-narrow pl-3 pr-1 py-3">
            <li class="text-xl flex items-center text-slate-700">
                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <p>Contenido Del Curso</p>
            </li>
            @foreach($course->posts as $post)
             <li class="border-b boder-[#e6ebf1] grid grid-cols-3 mt-5 pl-2 overflow-hidden">
                 <p class="col-span-2 text-slate-500">{{$post->name}}</p>
                 <!--Icono / ForEach-->
                 <div class="col-span-1 flex items-end  justify-end pb-1">
                     @if($post->free)
                         <div class="flex items-center mr-1 text-green-700">
                             <span class="text-sm">Free</span>
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1 text-green-700">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                             </svg>
                         </div>
                     @else
                         <div class="flex items-center mr-1 text-red-700">
                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                             </svg>
                         </div>
                        @endif
                 </div>
             </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
