<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;

class StudentController extends Controller
{
    /*
     * Student List
    */
    public function index()
    {
        $students = Student::with('major')->get();
        return view('students.index', compact('students'));
    }

    /*
     * Create Student
    */
    public function create()
    {
        $majors = Major::all();
        return view("students.create", compact('majors'));
    }

    /*
     * Store Student With Input Value From Request
     * @param StudentStoreRequest $request
    */
    public function store(StudentStoreRequest $request)
    {
        Student::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "major_id" => $request->major,
        ]);

        return redirect('/')->with('success', 'Successfully Created!');
    }

    /*
     * View Edit Page
     * @param $id
    */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $majors = Major::all();
        return view("students.edit", compact('student', 'majors'));
    }

    /*
     * Update Student
     * @param StudentUpdateRequest $request $id
    */
    public function update(StudentUpdateRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "major_id" => $request->major,
        ]);
        return redirect('/')->with('success', 'Successfully Updated!');
    }


    /*
     * Delete Student
     * @param $id
    */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        if (!$student) {
            return redirect('/')->with('success', 'Not Found!');
        } else {
            $student->delete();
        }
        return redirect('/')->with('success', 'Successfully Deleted!');
    }
}
