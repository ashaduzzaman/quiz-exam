<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Quiz;
use Illuminate\Http\Request;

class QuizListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizes = Quiz::orderBy('id', 'desc')
        ->get();
        // logger($quizes);
        return view('quizList', compact('quizes'));
    }
}
