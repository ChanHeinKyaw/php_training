<?php

namespace App\Dao\Major;


use App\Models\Major;
use App\Contracts\Dao\Major\MajorDaoInterface;

class MajorDao implements MajorDaoInterface
{
  /**
   * Create Major
   * @param $request
   * @return
   */
  public function saveMajor($request)
  {
    Major::create([
      'major' => $request->major,
    ]);
  }

  /**
   * Major List
   * @param
   * @return 
   */
  public function getMajorList()
  {
    $majors = Major::all();
    return $majors;
  }

  /**
   * Update Major By Id
   * @param $request,$id
   * @return 
   */
  public function updateMajorById($request, $id)
  {
    $major = Major::findOrFail($id);
    $major->update([
      'major' => $request->major,
    ]);
  }

  /**
   * Delete Major By Id
   * @param
   * @return 
   */
  public function deleteMajorById($id)
  {
    $major = Major::findOrFail($id);
    if (!$major) {
      return redirect('/major')->with('success', 'Not Found!');
    } else {
      $major->delete();
    }
  }
}
