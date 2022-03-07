<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Requests\MajorStoreRequest;
use App\Http\Requests\MajorUpdateRequest;
use App\Contracts\Services\Major\MajorServiceInterface;

class MajorController extends Controller
{
    /**
     * Student Interface
     */
    private $majorInterface;

    /**
     * Create a new controller instance.
     * @param MajorServiceInterface $majorServiceInterface
     * @return void
     */
    public function __construct(MajorServiceInterface $majorServiceInterface)
    {
        $this->majorInterface = $majorServiceInterface;
    }

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
        $this->majorInterface->saveMajor($request);
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
        $this->majorInterface->updateMajorById($request, $id);
        return redirect('/major')->with('success', 'Successfully Updated!');
    }

    /*
     * Delete Major
     * @param $id
    */
    public function destroy($id)
    {
        $this->majorInterface->deleteMajorById($id);
        return redirect('/major')->with('success', 'Successfully Deleted!');
    }
}
