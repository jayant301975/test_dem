@extends('layout.app')
@section('page_title','Section  Create')

@section('container')
    
<div class="container">
    <h4>Exam: {{ $exam->title }}</h4>
    <div class="card mb-4">
        <div class="card-header">Add Section</div>
        <div class="card-body">
            <form method="POST" action="{{route('sections.store')}}">
                @csrf
                <input type="hidden" name="exam_id" value="{{ $exam->id }}">

                <div class="mb-2">
                    <label>Section Title</label>
                    <input name="title"   class="form-control @error('title') is-invalid @enderror" />
                     @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label>Duration (minutes)</label>
                    <input name="duration" type="number"  class="form-control @error('duration') is-invalid @enderror">
                     @error('duration')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label>Negative Marks</label>
                    <input name="negative_marks" type="number" step="0.01"  class="form-control @error('negative_marks') is-invalid @enderror">
                     @error('negative_marks')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-success"  type="submit">Add Section</button>
            </form>
        </div>
    </div>
</div>
@endsection