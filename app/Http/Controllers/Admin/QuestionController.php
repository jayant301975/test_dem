<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Option;

Use DB;
class QuestionController extends Controller
{
      public function index($sectionId)
      {
        $section=Question::where('section_id',$sectionId)->get(); 
        $examId=Section::where('id',$sectionId)->first();    
        $exam = $examId->exam_id;  
        return view('admin.question.index',compact('sectionId','section','exam'));
      }

      public function loadQuestion($sectionId)
      {
        $section=Section::findOrFail($sectionId);
        return view('admin.question.create',compact('section'));
      }

     public function storeQuestion(QuestionRequest $request)
     {    
               
          DB::transaction(function () use ($request) {

      
                  $question = Question::create([
                      'section_id'     => $request->input('section_id'),
                      'question'       => $request->input('question'),
                      'type'           => $request->input('type'),
                      'marks'          => $request->input('marks'),
                      
                      'is_multiple'    => false, 
                  ]);
                  
                
                  if (in_array($request->input('type'), [1, 2])) {

                      foreach ($request->input('options') as $index => $opt) {
                          Option::create([
                              'question_id' => $question->id,
                              'option_text' => $opt['text'],
                              'is_correct'  => ($request->input('correct_option') == $index),
                          ]);
                      }
                  }
              });

               return redirect()->route('questions.create', ['sectionId' => $request->input('section_id')])->with('success', 'Question  created successfully.');





     }
      public function showQuestion($questionId)
      {
         $question = Question::with('options')->findOrFail($questionId);
   
        
        return view('admin.question.view',compact('questionId','question'));
      }



}
