@extends('layout.app')
@section('page_title','Question Create')

@section('container')
    
<div class="container">
    <h4>Exam: {{ $section->title }}</h4>
    <div class="card mb-4">
        <div class="card-header">Add Question</div>
        <div class="card-body">
            <form method="POST" id="questionForm"  action="{{route('questions.store')}}">
                @csrf
                <input type="hidden" name="section_id" value="{{ $section->id }}">

                <div class="mb-2">
                    <label>Question</label>
                    <textarea name="question"  rows="5"  class="form-control @error('question') is-invalid @enderror" ></textarea>
                     @error('question')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label>Type</label>
                    <select id="questionType" class="form-control @error('type') is-invalid @enderror" name="type">
                        <option value="0">Please Select Question Type</option>
                        <option value="1">MCQ</option>
                        <option value="2">Objective</option> 
                         <option value="3">Descriptive</option>          

                    </select>
                     @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label>Marks</label>
                    <input name="marks" type="number" step="0.01"  class="form-control @error('marks') is-invalid @enderror">
                     @error('marks')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="optionsBlock">
                    <h6>Add Options</h6>

                    <div id="optionWrapper">
                        <div class="row mb-2">
                            <div class="col-8">
                                <input type="text" name="options[0][text]" class="form-control"
                                    placeholder="Option Text">
                            </div>
                            <div class="col-4">
                                <input type="radio" name="correct_option" value="0">
                                Mark Correct
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-secondary" onclick="addOption()">
                        Add Option
                    </button>
                </div>
                <button class="btn btn-success mt-3"  type="submit">Add Question</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script>
        let optionIndex = 1;

        function addOption() {
            let html = `
            <div class="row mb-2">
                <div class="col-8">
                    <input type="text" name="options[${optionIndex}][text]"
                        class="form-control"
                        placeholder="Option Text">
                </div>
                <div class="col-4">
                    <input type="radio" name="correct_option" value="${optionIndex}">
                    Mark Correct
                </div>
            </div>`;
            document.getElementById('optionWrapper')
                    .insertAdjacentHTML('beforeend', html);
            optionIndex++;
        }

        // hide initially
        window.onload = function () {
            document.getElementById('optionsBlock').style.display = 'none';
        };

        // toggle on change
        document.getElementById('questionType').addEventListener('change', function () {
            document.getElementById('optionsBlock').style.display =
                this.value === '3' ? 'none' : 'block';
        });





        $('#questionForm').on('submit', function(e) {
                    let type = $('#questionType').val();
                    let valid = true;
                    let errorMsg = '';

                    if (type == '1' || type == '2') { // MCQ / Objective
                        let options = $('#optionWrapper input[type="text"]');
                        let filledOptions = 0;

                        options.each(function() {
                            if ($(this).val().trim() !== '') filledOptions++;
                        });

                        if (filledOptions < 2) {
                            valid = false;
                            errorMsg = 'Please add at least 2 options.';
                        }

                        // check at least one correct selected
                        if ($('input[name="correct_option"]:checked').length === 0) {
                            valid = false;
                            errorMsg = 'Please select the correct option.';
                        }
                    }

                    if (!valid) {
                        e.preventDefault(); // stop form submission
                        alert(errorMsg);    // or show error in a div
                        return false;
                    }

                    // Descriptive question type=3 → no options validation
                });

        </script>




@endpush