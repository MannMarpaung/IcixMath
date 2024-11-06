@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">

        <h1>Question of "{{ $lesson->title }}" Lesson - Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.index') }}">Levels</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.lesson.index', $level->id) }}">Lessons</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('admin.level.lesson.question.index', [$level->id, $lesson->id]) }}">Questions</a>
                </li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <form action="{{ route('admin.level.lesson.question.update', [$level->id, $lesson->id, $question->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit Question</h5>

                    <div class="row mb-3">
                        <label for="question" class="col-sm-2 col-form-label">Question</label>
                        <div class="col-sm-10">
                            <input type="text" id="question" class="form-control" name="question" required value="{{ $question->question }}">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-5">
                        <a href="{{ route('admin.level.lesson.question.index', [$level->id, $lesson->id]) }}"
                            class="btn btn-secondary">Cancel</a>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </div>
        </form>
    </section>z
@endsection
