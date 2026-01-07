@extends('layout.app')
@section('page_title','Section List')

@section('container')

<div class="row mb-3">
    <div class="col d-flex justify-content-end">
        <a href="{{ route('sections.load', $exam->id) }}"
           class="btn btn-success btn-sm">
            Add New Section
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
            <th>Section Title</th>
            <th>Duration (min)</th>
            <th>Negative Marks</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($sections as $section)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $section->title }}</td>
                <td>{{ $section->duration ?? '-' }}</td>
                <td>{{ $section->negative_marks ?? '0' }}</td>
                <td>
                   
                    <a href="{{route('questions.create',['sectionId'=>$section->id])}}"
                       class="btn btn-info btn-sm">
                        Add Questions
                    </a>
                    
                   
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">
                    No sections found.
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">
             <a href="{{ route('exam') }}"
           class="btn btn-primary btn-sm">
            Back
        </a>
        </td>
      </tr>

    </tfoot>
</table>

@endsection
