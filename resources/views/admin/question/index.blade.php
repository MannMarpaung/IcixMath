@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">

        <h1>Question of "{{ $lesson->title }}" Lesson</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.index') }}">Levels</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.lesson.index', $level->id) }}">Lessons</a></li>
                <li class="breadcrumb-item active">Questions</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Questions Table</h5>
                        <div class="d-flex justify-content-end">
                            <a type="button" href="{{ route('admin.level.lesson.question.create', [$level->id, $lesson->id]) }}"
                                class="btn btn-primary">Create
                                Question</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Question</th>
                                    <th>Correct Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($question as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::limit($row->question, 50) }}</td>
                                        <td>
                                            @forelse ($row->answers->where('status', 'CORRECT') as $answer)
                                                {{ $answer->answer }}
                                            @empty
                                                No Correct Answer
                                            @endforelse
                                        </td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('admin.level.lesson.question.answer.index', [$level->id, $lesson->id, $row->id]) }}"
                                                class="btn btn-info text-white">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.level.lesson.question.edit', [$level->id, $lesson->id, $row->id]) }}"
                                                class="btn btn-warning text-white">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('admin.level.lesson.question.destroy', [$level->id, $lesson->id, $row->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteQuestion{{ $row->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <div class="modal fade" id="deleteQuestion{{ $row->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Question - {{ Str::limit($row->question, 50) }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Question?
                                                                Deleting this Level will also delete all <strong>Answer</strong> in this Question.
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
