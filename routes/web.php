<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\User\DisplayController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('dashboard');


Route::get('/admin/exam',[ExamController::class,'index'])->name('exam');

Route::get('/admin/add-exam',[ExamController::class,'showExam'])->name('addExam');
Route::post('/admin/store-exam',[ExamController::class,'storeExam'])->name('storeExam');

Route::get('/admin/sections/create/{examsId}', [SectionController::class, 'index'])
     ->name('sections.create');

 Route::get('/admin/sections/load/{examsId}', [SectionController::class, 'loadSection'])
     ->name('sections.load');
    
 Route::post('/admin/sections/store', [SectionController::class, 'storeSection'])
     ->name('sections.store');


 Route::get('/admin/questions/create/{sectionId}', [QuestionController::class, 'index'])
     ->name('questions.create');

 Route::get('/admin/questions/load/{sectionId}', [QuestionController::class, 'loadQuestion'])
     ->name('questions.load');

 Route::post('/admin/questions/store', [QuestionController::class, 'storeQuestion'])
     ->name('questions.store');
 Route::get('/admin/questions/view/{questionId}', [QuestionController::class, 'showQuestion'])
     ->name('questions.view');   

 
     
Route::get('/exam/start/{exam}', [DisplayController::class, 'start'])->name('exam.start');

Route::get('/exam/{attempt}/question/{index}',[DisplayController::class, 'question'])->name('exam.question');

 Route::post('/exam/{attempt}/question/{index}',[DisplayController::class, 'saveAnswer'])->name('exam.answer');
       
    
Route::get('/exam/{attempt}/finish',[DisplayController::class, 'finish'])->name('exam.finish');