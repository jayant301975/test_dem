<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;
use App\Models\Exam;
class ExamController extends Controller
{
    public function index()
    {
       $data=Exam::all();
        return view('admin.exam.index',compact('data'));
    }
    public function showExam()
    {
         
        return view('admin.exam.create');
    }

   public function storeExam(ExamRequest $request)
   {
        $title=$request->input('title');
        $description=$request->input('description');
        Exam::create(['title'=>$title,'description'=>$description]);
        

        return redirect()->route('exam')->with('success', 'Exam created successfully.');

   }

}
