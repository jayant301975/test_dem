@extends('layout.font')

@section('page_title', 'Exam Finished')

@section('container_front')
<div class="container mt-5 text-center">

    <div class="card shadow">
        <div class="card-body">

            <h3 class="text-success mb-3">
                ✅ Exam Completed Successfully
            </h3>

            <p class="text-muted">
                Thank you for submitting the exam.
            </p>

            <a href="javascript:void(0)"
               class="btn btn-primary mt-3">
               Go to Dashboard
            </a>

        </div>
    </div>

</div>
@endsection

