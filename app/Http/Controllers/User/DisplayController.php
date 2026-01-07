<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamAttempt;
use App\Models\Exam;
use App\Models\Question;
use App\Models\ExamAnswer;
class DisplayController extends Controller
{
    

    public function start(Exam $exam)
    {
        $attempt = ExamAttempt::firstOrCreate([
            'exam_id' => $exam->id,
            'user_id' => 2,
        ], [
            'started_at' => now()
        ]);

        // redirect to first question
        return redirect()->route(
            'exam.question',
            [$attempt->id, 0]
        );
    }

    public function question(ExamAttempt $attempt, $index)
        {
           
            
            $questions = Question::whereHas('section', function ($q) use ($attempt) {
                $q->where('exam_id', $attempt->exam_id);
            })
            ->with('options')
            ->orderByRaw("
            CASE
                WHEN type = 1 THEN 1
                WHEN type = 2 THEN 2
                WHEN type = 3 THEN 3
            END
        ")
        ->orderBy('id')
            ->get();

            if (!isset($questions[$index])) {
                return redirect()->route('exam.finish', $attempt->id);
            }

            $question = $questions[$index];

            // load previously saved answer (if exists)
            $savedAnswer = ExamAnswer::where([
                'exam_attempt_id' => $attempt->id,
                'question_id' => $question->id
            ])->first();

            return view('user.exam.question', compact(
                'attempt',
                'question',
                'index',
                'questions',
                'savedAnswer'
            ));
        }

        public function saveAnswer(Request $request,ExamAttempt $attempt,$index ) 
        {
            
            $questions = Question::whereHas('section', function ($q) use ($attempt) {
                $q->where('exam_id', $attempt->exam_id);
            })->orderBy('id')->get();

            $question = $questions[$index];

            ExamAnswer::updateOrCreate(
                [
                    'exam_attempt_id' => $attempt->id,
                    'question_id' => $question->id,
                ],
                [
                    'answer' => is_array($request->answer) ? null : $request->answer,
                    'selected_options' => is_array($request->answer)
                        ? json_encode($request->answer)
                        : null,
                ]
            );

            return redirect()->route(
                'exam.question',
                [$attempt->id, $index + 1]
            );
        }
        public function finish(ExamAttempt $attempt)
        {
            $attempt->update(['ended_at' => now()]);
            return view('user.exam.finished');
        }
    

}
