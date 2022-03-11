<?php

namespace App\Services\Student;

use App\Mail\SendMail;
use App\Mail\DeleteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
       $this->studentDao->saveStudent($request);

       $sendMail = [
           "title" => "Student Account Created",
           "body"  => "Welcome To Our School",
       ];

       Mail::to("chanheinkyaw.mm@gmail.com")->send(new SendMail($sendMail));

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
        $this->studentDao->deleteStudentById($id);

        $deleteMail = [
            "title" => "Student Account Delete",
            "body"  => "Bye Bye From Our School",
        ];
 
        Mail::to("chanheinkyaw.mm@gmail.com")->send(new DeleteMail($deleteMail));
    }
}
