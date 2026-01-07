@extends('layout.app')
@section('page_title','Create Exam')

@section('container')
    <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Add New Exam</h5>
                            <a href="{{ route('exam') }}" class="btn btn-sm btn-secondary">
                                Back
                            </a>
                        </div>

                        <div class="card-body">
                            <form action="{{route('storeExam')}}" method="POST">
                                @csrf

                                <!-- Exam Title -->
                                <div class="mb-3">
                                    <label class="form-label">
                                        Exam Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Enter exam title"
                                        value="{{ old('title') }}">

                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label class="form-label">
                                        Description
                                    </label>
                                    <textarea name="description"
                                            rows="4"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Enter exam description (optional)">{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Save Exam
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



@endsection
