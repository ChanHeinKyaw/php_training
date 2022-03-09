<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;

class ApiController extends Controller
{
    /*
     * View Student List
     * @param 
    */
    public function index()
    {
        $students = Student::all();
        return $students;
    }

    /*
     * Create Student 
     * @param 
    */
    public function store(StudentStoreRequest $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'major_id' => $request->major,
        ]);

        return $student;
    }

    /*
     * Get Student By Id
     * @param $id
    */
    public function show($id)
    {
        $student = Student::find($id);
        return $student;
    }

    /*
     * Update Student By Id
     * @param StudentUpdateRequest,$request,$id
    */
    public function update(StudentUpdateRequest $request, $id)
    {
        $student = Student::find($id);
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'major_id' => $request->major,
        ]);

        return $student;
    }

    /*
     * Delete Student By Id
     * @param $id
    */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return $student;
    }
}
