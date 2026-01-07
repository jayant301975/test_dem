@extends('layout.font')
@section('page_title','Question')

@section('container_front')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">

            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <strong>
                        Question {{ $index + 1 }} of {{ $questions->count() }}
                    </strong>
                    <span class="badge bg-info">
                        {{ $question->marks }} Marks
                    </span>
                </div>

                <div class="card-body">

                    <form method="POST"
                          action="{{ route('exam.answer', [$attempt->id, $index]) }}">
                        @csrf

                        {{-- Question --}}
                        <p class="fw-semibold fs-5">
                            {{ $question->question }}
                        </p>

                        {{-- MCQ --}}
                        @if($question->type == 1)
                            @foreach($question->options as $opt)
                                <div class="form-check mb-2">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="answer[]"
                                           value="{{ $opt->id }}"
                                           id="opt{{ $opt->id }}"
                                           @if($savedAnswer && in_array(
                                               $opt->id,
                                               json_decode($savedAnswer->selected_options ?? '[]')
                                           )) checked @endif>

                                    <label class="form-check-label"
                                           for="opt{{ $opt->id }}">
                                        {{ $opt->option_text }}
                                    </label>
                                </div>
                            @endforeach
                        @endif

                        {{-- Objective --}}
                        @if($question->type == 2)
                            <input type="text"
                                   name="answer"
                                   class="form-control"
                                   placeholder="Enter your answer"
                                   value="{{ $savedAnswer->answer ?? '' }}">
                        @endif

                        {{-- Descriptive --}}
                        @if($question->type == 3)
                            <textarea name="answer"
                                      rows="5"
                                      class="form-control"
                                      placeholder="Write your answer here...">{{ $savedAnswer->answer ?? '' }}</textarea>
                        @endif

                        {{-- Navigation --}}
                        <div class="d-flex justify-content-between mt-4">

                            {{-- Previous --}}
                            @if($index > 0)
                                <a href="{{ route('exam.question', [$attempt->id, $index - 1]) }}"
                                   class="btn btn-outline-secondary">
                                    ⬅ Previous
                                </a>
                            @else
                                <span></span>
                            @endif

                            {{-- Next / Finish --}}
                            <button type="submit"
                                    class="btn btn-primary">
                                {{ $index + 1 == $questions->count()
                                    ? 'Finish Exam'
                                    : 'Next ➡' }}
                            </button>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
