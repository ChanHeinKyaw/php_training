<?php

namespace App\Dao\Student;


use App\Models\Student;
use App\Contracts\Dao\Student\StudentDaoInterface;

class StudentDao implements StudentDaoInterface
{
    /**
     * Create Student
     * @param $request
     * @return
     */
    public function saveStudent($request)
    {
        Student::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "major_id" => $request->major,
        ]);
    }

    /**
     * Student List
     * @param
     * @return 
     */
    public function getStudentList()
    {
        $students = Student::all();
        return $students;
    }

    /**
     * Update Student By Id
     * @param $request,$id
     * @return 
     */
    public function updateStudentById($request,$id)
    {
        $student = Student::findOrFail($id);
        $student->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "major_id" => $request->major,
        ]);
    }

    /**
     * Delete Student By Id
     * @param
     * @return 
     */
    public function deleteStudentById($id)
    {
        $student = Student::findOrFail($id);
        if (!$student) {
            return redirect('/')->with('success', 'Not Found!');
        } else {
            $student->delete();
        }
    }
}
