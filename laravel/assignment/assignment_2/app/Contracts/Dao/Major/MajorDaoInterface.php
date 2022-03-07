<?php

namespace App\Contracts\Dao\Major;

interface MajorDaoInterface
{
    /**
     * Create Major
     * @param $request
     */
    public function saveMajor($request);

    /**
     * Major List
     * @param $request
     */
    public function getMajorList();

    /**
     * Update Major By Id
     * @param $request
     */
    public function updateMajorById($request,$id);

    /**
     * Delete Major By Id
     * @param $id
     */
    public function deleteMajorById($id);
}
