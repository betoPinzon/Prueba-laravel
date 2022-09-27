<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers.home',['profesores'=>Teacher::latest()->paginate()]);
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.profile',[
            'profesor'=> $teacher
        ]);
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit',['teacher'=>$teacher]);
    }
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'profession'=> 'required',
            'email'=> 'required|unique:teachers,email,' . $teacher->id ,
            'tel'=> 'required',
        ]);

        $teacher->update($request->all());
        if ($request->file('file')){
            Storage::disk('public')->delete($teacher->image);
            $teacher->image = $request->file('file')->store('teachers','public');
            $teacher->save();
        }
        return redirect()->route('teachers.edit',$teacher)->with('status', 'Curso Actualizado con Éxito');

    }
    public function create()
    {
        return view('teachers.create');
    }
    public function store(Request $request,Teacher $teacher)
    {
        $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'profession'=> 'required',
            'email'=> 'required|unique:teachers,email',
            'tel'=> 'required',
        ]);
        $teacher = Teacher::create($request->all());
        if ($request->file('file')){
            $teacher->image = $request->file('file')->store('teachers','public');
            $teacher->save();
        }
        return redirect()->route('teachers.index')->with('status', 'profesor Creado con Éxito');
    }
    public function destroy(Teacher $teacher)
    {
        Storage::disk('public')->delete($teacher->image);
        $teacher->delete();
        return back()->with('status', 'Curso Eliminado con Éxito');
    }
}
