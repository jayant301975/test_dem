<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Http\Requests\SectionRequest;
use App\Models\Section;

class SectionController extends Controller
{
    
    // For Section Loading
    public function index($examsId)
    {
        $exam = Exam::findOrFail($examsId);
        $sections=Section::where('exam_id',$examsId)->get();
        return view('admin.sections.index', compact('exam','sections'));
    }

    // For Adding Section 
     public function loadSection($id )
     {
        $exam = Exam::findOrFail($id);
       
        return view('admin.sections.create', compact('exam'));
     }

     public function storeSection(SectionRequest $request)
     {
         $exam_id=$request->input('exam_id');
         $title=$request->input('title');
         $duration=$request->input('duration');
         $negative_marks=$request->input('negative_marks');
          Section::create(['exam_id'=>$exam_id,'title'=>$title,'duration'=>$duration,'negative_marks'=>$negative_marks]);      
        return redirect()->route('sections.create', ['examsId' => $request->input('exam_id')])->with('success', 'Section created successfully.');

     }

}
