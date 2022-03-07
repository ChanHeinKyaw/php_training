<?php

namespace App\Services\Student;

use App\Exports\CsvExport;
use App\Imports\CsvImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;


class StudentService implements StudentServiceInterface
{
    /**
     * Task Dao
     */
    private $studentDao;

    /**
     * Class Constructor
     * @param StudentDaoInterface $studentDao
     * @return
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * To Save Student with values from request
     * @param Request $request
     * @return
     */
    public function saveStudent($request)
    {
        return $this->studentDao->saveStudent($request);
    }

    /**
     * View Student List
     * @return
     */
    public function getStudentList()
    {
        return $this->studentDao->getStudentList();
    }


    /**
     * Update Student By Id
     * @return
     */

    public function updateStudentById($request, $id)
    {
        return $this->studentDao->updateStudentById($request,$id);
    }

    /**
     * Delete Student By Id
     * @return
     */
    public function deleteStudentById($id)
    {
        return $this->studentDao->deleteStudentById($id);
    }
}
