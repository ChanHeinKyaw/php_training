<?php

namespace App\Contracts\Services\Major;

use Illuminate\Http\Request;

interface MajorServiceInterface
{
    /**
     * Create Major
     * @param $request
     */
    public function saveMajor($request);

    /**
     * Major Lisk
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
     * @param $request
     */
    public function deleteMajorById($id);
}
