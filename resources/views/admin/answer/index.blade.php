@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">

        <h1>Answer of "{{ Str::limit($question->question, 25) }}" Question</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.index') }}">Levels</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.lesson.index', $level->id) }}">Lessons</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.lesson.question.index', [$level->id, $lesson->id]) }}">Question</a></li>
                <li class="breadcrumb-item active">Answers</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Answers Table</h5>
                        <div class="d-flex justify-content-end">
                            <a type="button" href="{{ route('admin.level.lesson.question.answer.create', [$level->id, $lesson->id, $question->id]) }}"
                                class="btn btn-primary">Create
                                Answer</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Answer</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($answer as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::limit($row->answer, 50) }}</td>
                                        <td class="{{ $row->status == 'CORRECT' ? 'text-success' : 'text-danger' }}">{{ $row->status }}</td>
                                        <td class="d-flex gap-1">

                                            <a href="{{ route('admin.level.lesson.question.answer.edit', [$level->id, $lesson->id, $question->id, $row->id]) }}"
                                                class="btn btn-warning text-white">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('admin.level.lesson.question.answer.destroy', [$level->id, $lesson->id, $question->id, $row->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAnswer{{ $row->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <div class="modal fade" id="deleteAnswer{{ $row->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Answer - {{ $row->answer }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Answer?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
