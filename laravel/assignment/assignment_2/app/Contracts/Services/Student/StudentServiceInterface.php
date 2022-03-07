<?php

namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;

interface StudentServiceInterface
{
    /**
     * Create Student
     * @param $request
     */
    public function saveStudent($request);

    /**
     * Student Lisk
     * @param $request
     */
    public function getStudentList();

    /**
     * Update Student By Id
     * @param $request
     */
    public function updateStudentById($request, $id);

    /**
     * Delete Student By Id
     * @param $request
     */
    public function deleteStudentById($id);
}
