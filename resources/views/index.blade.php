@extends('layouts.template')
@section('contentIndex')
    <div class="flex flex-col items-center mb-10">
        <img class="w-2/12" src="{{asset('img/LOGO.svg')}}">
        <h2 class="font-narrow text-4xl font-medium">Educate online como profesional</h2>
        <h3 class="font-narrow text-lg text">Aprende con los mejores profesionales y forma parte de la mayor comunidad para creativos.</h3>
    </div>
    <div class="grid grid-cols-3 gap-8 mt-5 mx-5">
        @foreach($courses as $course)
            <div class="card-course">
                <a class="" href="{{route('post',$course->slug)}}">
                    <div class="w-full h-[300px] bg-center bg-cover" style="background-image: url({{$course->get_image}})">
                    </div>
                    <h2 class="font-bold text-xl text-slate-500 my-2.5 ml-2.5 leading-5">{{$course->name}}</h2>
                    <h4 class="ml-2.5">{{$course->extracto}}</h4>
                    <div class="relative flex items-center justify-between mt-5 pl-2.5 bottom-2">
                        <div class="flex flex items-center">
                            @if(!$course->teacher_id == null)
                                @if(!$course->teacher->image == null)
                                    <img class="w-[30px] h-[30px]] rounded-full" src="{{$course->teacher->get_image}}" alt="">
                                @else
                                    <div class="bg-gray-500  w-[30px] h-[30px] rounded-full flex items-center text-white justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </div>
                                @endif
                                <p class="ml-3">{{$course->teacher->firstname ." ". $course->teacher->lastname}}</p>
                            @endif
                        </div>
                        @if(!$course->category_id == null)
                            <p class="bg-blue-200 rounded px-1 mr-2.5">{{ucfirst($course->category->name)}}</p>
                        @endif
                    </div>

                </a>
            </div>
        @endforeach
    </div>
    <div class="px-5 mt-2.5">
        {{ $courses->links() }}
    </div>
@endsection
