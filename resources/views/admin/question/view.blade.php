@extends('layout.app')
@section('page_title','Question  View')

@section('container')

<div class="row mb-3">
    <div class="col d-flex justify-content-end">
        
           View Question 
       
    </div>
</div>


<div class="card">
    <div class="card-header">
        <h5>Question Details</h5>
    </div>

    <div class="card-body">
        <p><strong>Question:</strong> {{ $question->question }}</p>

        <p><strong>Type:</strong>
            @if($question->type == 1) MCQ
            @elseif($question->type == 2) Objective
            @else Descriptive
            @endif
        </p>

        <p><strong>Marks:</strong> {{ $question->marks }}</p>

        @if($question->type != 3)
            <hr>
            <h6>Options</h6>

            <ul class="list-group">
                @foreach($question->options as $option)
                    <li class="list-group-item d-flex justify-content-between">
                        {{ $option->option_text }}
                        @if($option->is_correct)
                            <span class="badge bg-success">Correct</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-info mt-3">
                This is a descriptive question. No options available.
            </div>
        @endif
    </div>
   <div class="row">
        <div class="col d-flex justify-content-start">
        <a href="{{ route('questions.create', $question->section_id) }}"
           class="btn btn-primary btn-sm">
            Back
        </a>
    </div>

   </div>

</div>
@endsection
