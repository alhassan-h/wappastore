<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Student;
use App\Http\Requests\AddUpdateStudentRequest;
use App\Rules\RegnoValidation;

class StudentController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $students = Student::get();
        return view('students', compact('students'));
    }
    
    public function add(){
        return view('students_add');
    }
    
    public function edit($id){
        $student = Student::where('id', $id)->first();
        return view('student_edit', compact('student'));
    }
    
    public function save(AddUpdateStudentRequest $request){

        $validatedData = $request->safe()->except(['regno']);

        $student = Student::create($validatedData);

        return back()->with('success', 'Student Added Successfully!');
    }
    
    public function update(Request $request, $id){
        
        $student = Student::where('id', $id)->first();

        $validatedData = $request->validate([
            'regno' => ['sometimes','required',new RegnoValidation],
            'name' => 'required',
            'email' => ['required','email',Rule::unique('students')->ignore($student)],
            'phone' => ['required','size:11',Rule::unique('students')->ignore($student)],
            'address' => 'required',
        ]);

        Student::where('id', $id)->update($validatedData);
        
        return back()->with('success', 'Student Updated Successfully!');
    }
    
    public function delete($id){
        Student::where('id', $id)->delete();
        return back()->with('success', 'Student Deleted Successfully!');
    }
}
