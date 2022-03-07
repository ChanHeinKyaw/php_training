<?php

namespace App\Services\Major;

use Illuminate\Http\Request;
use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;


class MajorService implements MajorServiceInterface
{
    /**
     * Task Dao
     */
    private $majorDao;

    /**
     * Class Constructor
     * @param StudentDaoInterface $studentDao
     * @return
     */
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }

    /**
     * To Save Major with values from request
     * @param Request $request
     * @return
     */
    public function saveMajor($request)
    {
        return $this->majorDao->saveMajor($request);
    }

    /**
     * View Major List
     * @return
     */
    public function getMajorList()
    {
        return $this->majorDao->getMajorList();
    }


    /**
     * Update Major By Id
     * @return
     */

    public function updateMajorById($request, $id)
    {
        return $this->majorDao->updateMajorById($request, $id);
    }

    /**
     * Delete Major By Id
     * @return
     */
    public function deleteMajorById($id)
    {
        return $this->majorDao->deleteMajorById($id);
    }
}
