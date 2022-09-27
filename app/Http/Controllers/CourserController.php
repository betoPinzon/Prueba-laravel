<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Courser;
use App\Models\Teacher;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CourserController extends Controller
{
    public function index(Courser $courser)
    {
        return view('coursers.home',['coursers'=>$courser::latest()->paginate(12)]);
    }

    public function create()
    {
        return view('coursers.create',[
            'categories' => Category::get(),
            'teachers' => Teacher::get(),
        ]);
    }

    public function store(Request $request, Category $category, Teacher $teacher)
    {
        $request->validate([
            'name'=> 'required',
            'description'=>'required'
        ]);
        $curso = Courser::create([
            'name' => $title = $request->name,
            'slug' => Str::slug($title)
            ] + $request->all());
        if ($request->file('file')){
            $curso->image = $request->file('file')->store('coursers','public');
            $curso->save();
        }

//        $post = $request->category()->coursers()->create([
//            'name' => $title = $request->title,
//            'slug' => Str::slug($title),
//            'description' => $request->description,
//            'teacher_id'=> $request->teacher,
//            'category_id' => $request->category,
//        ]);
        return redirect()->route('coursers.index')->with('status', 'Curso Creado con Éxito');
    }



    public function edit(Courser $courser)
    {
        return view('coursers.edit',[
            'courser'=> $courser,
            'categories' => Category::get(),
            'teachers' => Teacher::get(),
            ]);
    }


    public function update(Request $request, Courser $courser)
    {
        $request->validate([
            'name'=> 'required',
            'description' => 'required' ,
        ]);

        $courser->update([
            'name' => $title = $request->name ,
            'slug' => Str::slug($title)
        ] + $request->all());

//        $curso = Courser::updated([
//                'name' => $title = $request->name,
//                'slug' => Str::slug($title)
//            ] + $request->all());
        if ($request->file('file')){
            Storage::disk('public')->delete($courser->image);
            $courser->image = $request->file('file')->store('coursers','public');
            $courser->save();
        }

        return redirect()->route('coursers.edit',$courser)->with('status', 'Curso Actualizado con Éxito');

    }


    public function destroy(Courser $courser)
    {
        Storage::disk('public')->delete($courser->image);
        $courser->delete();
        return back()->with('status', 'Curso Eliminado con Éxito');
    }
}
