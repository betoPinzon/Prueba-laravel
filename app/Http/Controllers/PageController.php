<?php

namespace App\Http\Controllers;

use App\Models\Courser;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('index',['courses'=>Courser::latest()->paginate(6)]);
    }
    public function course(Courser $course){
        return view('course',compact('course'));
    }

}
