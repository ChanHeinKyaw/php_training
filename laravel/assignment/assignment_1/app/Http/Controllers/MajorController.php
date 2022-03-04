<?php

namespace App\Http\Controllers;

use App\Http\Requests\MajorStoreRequest;
use App\Http\Requests\MajorUpdateRequest;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /*
     * Major List
    */
    public function index()
    {
        $majors = Major::all();
        return view('major.index', compact('majors'));
    }

    /*
     * Create Major
    */
    public function create()
    {
        return view('major.create');
    }

    /*
     * Store Major With Input Value From Request
     * @param MajorStoreRequest $request
    */
    public function store(MajorStoreRequest $request)
    {
        Major::create([
            'major' => $request->major,
        ]);
        return redirect('/major')->with('success', 'Successfully Created!');
    }

    /*
     * View Edit Page
     * @param $id
    */
    public function edit($id)
    {
        $major = Major::findOrFail($id);
        return view('major.edit', compact('major'));
    }

    /*
     * Update Major
     * @param MajorUpdateRequest $request $id
    */
    public function update(MajorUpdateRequest $request, $id)
    {
        $major = Major::findOrFail($id);
        $major->update([
            'major' => $request->major,
        ]);
        return redirect('/major')->with('success', 'Successfully Updated!');
    }

    /*
     * Delete Major
     * @param $id
    */
    public function destroy($id)
    {
        $major = Major::findOrFail($id);
        if (!$major) {
            return redirect('/major')->with('success', 'Not Found!');
        } else {
            $major->delete();
        }
        return redirect('/major')->with('success', 'Successfully Deleted!');
    }
}
