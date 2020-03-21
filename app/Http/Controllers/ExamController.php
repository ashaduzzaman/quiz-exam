<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Http\Requests;
use Session;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examList = Exam::orderBy('id', 'desc')->get();
        logger($examList);
        return view('admin/examlist', compact('examList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        logger($request);
        // $start_date_time = $request->examDate +' '+ $request->examTime;
        $exam = Exam::create([
            'name' => $request->examTitle, 
            'start_date' => $request->examDate,
            'start_time'=> $request->examTime, 
            'duration' => $request->examDuration
        ]);

        Session::flash('alert-success', 'Exam created successfully');
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // dd($request->all());
        $exam = Exam::where('id', $request->examId)->update([
            'name' => $request->examTitle, 
            'start_date' => $request->examDate,
            'start_time'=> $request->examTime, 
            'duration' => $request->examDuration
        ]);

        Session::flash('alert-success', 'Exam updated successfully');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        logger('destroy');
        logger($id);

        Exam::where('id', $id)->delete();

        Session::flash('alert-danger', 'Exam deleted successfully');
        return redirect()->route('admin.index');
    }
}
