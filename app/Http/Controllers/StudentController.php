<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'age'=> 'required|integer',
        ]);
        $student = new Student([
            'name' => $request->get('name'),
            'age'=> $request->get('age'),
        ]);
        $student->save();
        return redirect('/student')->with('success', 'Élève ajouté avec succès');
    }

    public function index() {
        $students = Student::all();

        return view('index', compact('students'));
    }

    public function edit($id)
    {
        $student = Student::find($id);

        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'age'=> 'required|integer',
        ]);

        $student = Student::find($id);
        $student->name = $request->get('name');
        $student->age = $request->get('age');
        $student->save();

        return redirect('/student')->with('success', 'Élève mis à jour avec succès');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/student')->with('success', 'Élève correctement supprimé');
    }


}
