<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use App\Exports\CsvExport;
use App\Imports\CsvImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Contracts\Services\Student\StudentServiceInterface;


class StudentController extends Controller
{
    /**
     * Student Interface
     */
    private $studentInterface;

    /**
     * Create a new controller instance.
     * @param StudentServiceInterface $studentServiceInterface
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /*
     * Student List
    */
    public function index()
    {
        $students = Student::with('major')->get();
        return view('students.index', compact('students'));
    }

    /*
     * Create Student
    */
    public function create()
    {
        $majors = Major::all();
        return view("students.create", compact('majors'));
    }

    /**
     * Store Student With Input Value From Request
     * @param StudentStoreRequest $request
    */
    public function store(StudentStoreRequest $request)
    {
        $this->studentInterface->saveStudent($request);
        return redirect('/')->with('success', 'Successfully Created!Check Your Mail');
    }

    /**
     * View Edit Page
     * @param $id
    */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $majors = Major::all();
        return view("students.edit", compact('student', 'majors'));
    }

    /**
     * Update Student
     * @param StudentUpdateRequest $request $id
    */
    public function update(StudentUpdateRequest $request, $id)
    {
        $this->studentInterface->updateStudentById($request, $id);
        return redirect('/')->with('success', 'Successfully Updated!');
    }


    /**
     * Delete Student
     * @param $id
    */
    public function destroy($id)
    {
        $this->studentInterface->deleteStudentById($id);
        return redirect('/')->with('success', 'Successfully Deleted!Check Your Mail');
    }

    /**
     * CSV Import
     * @param 
    */
    public function import(){
        Excel::import(new CsvImport,request()->file('file'));
        return back();
    }

    /**
     * CSV Export
     * @param 
    */
    public function export(){
        return Excel::download(new CsvExport, 'sample.csv');
    }

    /**
     * Search
     * @param Request $request
    */
    public function search(Request $request){
        $searchData = $request->search;

        $students = DB::table('students')
        ->select(DB::raw('id,name, email, phone , major_id as major'))
        ->where('name', 'LIKE', "%$searchData%")
        ->orwhere('email', 'LIKE', "%$searchData%")
        ->orWhere('phone', 'LIKE', "%$searchData%")
        ->get();
        
        return view('students.index',compact('students'));
    }
}
