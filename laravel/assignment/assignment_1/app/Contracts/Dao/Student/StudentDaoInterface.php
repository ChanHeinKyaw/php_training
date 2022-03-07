<?php

namespace App\Contracts\Dao\Student;

interface StudentDaoInterface
{
    /**
     * Create Student
     * @param $request
     */
    public function saveStudent($request);

    /**
     * Student List
     * @param $request
     */
    public function getStudentList();

    /**
     * Update Student By Id
     * @param $request
     */
    public function updateStudentById($request,$id);

    /**
     * Delete Student By Id
     * @param $id
     */
    public function deleteStudentById($id);
}
