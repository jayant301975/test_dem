@extends('layout.app')
@section('page_title','Question  List')

@section('container')

<div class="row mb-3">
    <div class="col d-flex justify-content-end">
        <a href="{{ route('questions.load', $sectionId) }}"
           class="btn btn-success btn-sm">
            Add New Question 
        </a>
    </div>
</div>


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(() => {
            let alert = document.getElementById('successAlert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Marks</th>
            <th>Question Type</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
       @foreach($section as $sections)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$sections->question}}</td>
            <td>{{$sections->marks}}</td>
            <td>
                @if($sections->type==1)
                {{"MCQ"}}
                @elseif($sections->type==2)
                {{"Objective"}}
                @else
                {{"Descriptive"}}
                @endif
            </td>
            <td>
                <a href="{{route('questions.view',['questionId' => $sections->id]) }}" class="btn btn-info">View Question</a>
               

            </td>
        </tr>
       @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">
         
            @if($section->isNotEmpty())
             <a href="{{ route('sections.create', $exam) }}"
           class="btn btn-primary btn-sm">
            Back
        </a>
        @endif
        </td>
      </tr>

    </tfoot>
</table>

@endsection
