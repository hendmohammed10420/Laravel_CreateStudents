<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student ;
use Auth;
use App\Http\Requests\StudentRequest;
class StudentController extends Controller
{
    public function create(){
            return view('student.create');
    }
    public function edit($id){
        $student = Student::find($id);
        return view('student.edit',['student'=>Student::find($id)]);
    }


    public function index(){
        // dd(Auth::user()->students);
        // $all_students= Student::where('user_id', Auth::id())->get();
        // $all_students=Auth::user()->students;
        return view('student.index',['students'=>Auth::user()->students]);

    }
    public function destroy($id){
        $student = Student::find($id);
        if ($student) {
            $student->destroy($id);
        }
        return redirect('students');
    }

    public function store(StudentRequest $request)
    {
        // Check if a soft-deleted student with the same IDno exists
        $student = Student::onlyTrashed()->where('IDno', $request->IDno)->first();
        // If a soft-deleted student exists, restore it and update its attributes
        if ($student) {
            $student->restore();
            $student->update([
                'name' => $request->name,
                'age' => $request->age,
                'track_id' => $request->track_id,
                'user_id' => Auth::id(),
            ]);
        } else {
            // Create a new student with the given attributes
            // $student = Student::create([
            //     'IDno' => $request->IDno,
            //     'name' => $request->name,
            //     'age' => $request->age,
            //     'track_id' => $request->track_id,
            //     'user_id' => Auth::id(),
            // ]);
            $request->user()->students()->create($request->all());
        }

        // return redirect('students');
        return back()->with('success','Student created successfully.');

    }

        // $student=   new Student();
        // $student->IDno = $request ->get('IDno');
        // $student->name = $request ->get('name');
        // $student->age = $request ->get('age');
        // $student->track_id = $request ->get('track_id');
        // $student->user_id = Auth::id();
        // $student->save();
        // return redirect('students');;

        // $student->user_id = $request->user()->id;
        // return redirect()->back()->with('success', 'Student created successfully.');


        public function update(Request $request, $id){

            $student = Student::find($id);
            $student->update([
                'IDno' => $request->IDno,
                'name' => $request->name,
                'age' => $request->age,
                'track_id' => $request->track_id,
            ]);
         if($student->save()){
         $request->session()->flash('success', 'Student updated successfully');

            return redirect('students');
        }
        }
}
