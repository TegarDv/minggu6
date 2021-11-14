<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kelas;
use PDF;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $students = Student::with('kelas')->get();
        return view('students.index',['student'=>$students]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('students.create',['kelas'=>$kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;

        if($request->file('photo')){ $image_name = $request->file('photo')->store('images','public'); }

        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->department = $request->department;
        $student->phone_number = $request->phone_number;
        $student->photo = $image_name;
        $kelas = new Kelas;
        $kelas->id = $request->Kelas;
        $student->kelas()->associate($kelas);
        $student->save();
        // if true, redirect to index
        return redirect()->route('students.index')
        ->with('success', 'Add data success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $kelas = Kelas::all();
        return view('students.edit',['student'=>$student, 'kelas'=>$kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->department = $request->department;
        $student->phone_number = $request->phone_number;

        $kelas = new Kelas;
        $kelas->id = $request->Kelas;

        if($student->photo && file_exists(storage_path('app/public/' . $student->photo))) 
        { 
            \Storage::delete('public/'.$student->photo); 
        } 
        $image_name = $request->file('photo')->store('images', 'public'); 
        $student->photo = $image_name;

        $student->kelas()->associate($kelas);
        $student->save();
            
        return redirect()->route('students.index');  
    }

    public function menu_nilai($id)
    {
        $student = Student::find($id);
        return view('students.nilai', ['student'=>$student]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }
    public function view($id)
    {
        $data = array(
            'id' => "post",
            'post' => Post::find($id)
        );
        return view('students.view')->with($data);
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $student = student::where('name', 'like', "%" . $keyword . "%")->paginate(5);
        return view('students.index', compact('student'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function report($id){
        $student = Student::find($id);
        $pdf = PDF::loadview('students.report',['student'=>$student]);
        return $pdf->stream();
    } 
}
