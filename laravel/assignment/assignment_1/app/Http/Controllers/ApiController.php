<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Contracts\Services\Student\StudentServiceInterface;

class ApiController extends Controller
{
    /**
     * Student Interface
     */
    private $studentInterface;

    /**
     * Create a new controller instance.
     * @param StudentServiceInterface $studentServiceInterface
     * @return void
     */

    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }
    /*
     * View Student List
     * @param 
    */
    public function index()
    {
        return $this->studentInterface->getStudentList();
    }

    /*
     * Create Student 
     * @param 
    */
    public function store(StudentStoreRequest $request)
    {
        $this->studentInterface->saveStudent($request);
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
        $this->studentInterface->updateStudentById($request,$id);
    }

    /*
     * Delete Student By Id
     * @param $id
    */
    public function destroy($id)
    {
        $this->studentInterface->deleteStudentById($id);
    }
}
