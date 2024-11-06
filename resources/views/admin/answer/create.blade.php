@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">

        <h1>Answer of "{{ Str::limit($question->question, 25) }}" Question - Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.index') }}">Levels</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.lesson.index', $level->id) }}">Lessons</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('admin.level.lesson.question.index', [$level->id, $lesson->id]) }}">Questions</a>
                </li>
                <li class="breadcrumb-item"><a
                        href="{{ route('admin.level.lesson.question.answer.index', [$level->id, $lesson->id, $question->id]) }}">Answers</a>
                </li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <form
            action="{{ route('admin.level.lesson.question.answer.store', [$level->id, $lesson->id, $question->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Create Answer</h5>

                    <div class="row mb-3">
                        <label for="answer" class="col-sm-2 col-form-label">Answer</label>
                        <div class="col-sm-10">
                            <input type="text" id="answer" class="form-control" name="answer" required>
                        </div>
                    </div>

                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="WRONG"
                                    value="WRONG" checked>
                                <label class="form-check-label" for="WRONG">
                                    WRONG Answer
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="CORRECT"
                                    value="CORRECT">
                                <label class="form-check-label" for="CORRECT">
                                    CORRECT Answer
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <div class="d-flex justify-content-between mt-5">
                        <a href="{{ route('admin.level.lesson.question.answer.index', [$level->id, $lesson->id, $question->id]) }}"
                            class="btn btn-secondary">Cancel</a>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </div>
        </form>
    </section>
@endsection
