@extends('layout.app')
@section('page_title','Exam List')

@section('container')
   <div class="row">
        <div class="col d-flex justify-content-end">
            <a href="{{ route('addExam') }}" class="btn btn-success btn-sm">
                Add New Exam
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

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Exam Title</th>
            <th scope="col">Descriptions</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $exams)    
        <tr>
            <th scope="row"> {{ $loop->iteration }}</th>
            <td>{{$exams->title}}</td>
            <td>{{$exams->description}}</td>
            <td>
                <a href="{{route('sections.create',['examsId' => $exams->id]) }}" class="btn btn-info">Add Section</a>
               
            </td>
            </tr>
           
        @endforeach    
        </tbody>
</table>



@endsection