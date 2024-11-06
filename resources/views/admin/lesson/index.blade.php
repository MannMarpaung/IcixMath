@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">

        <h1>Lessons of Level "{{ $level->level }}"</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.index') }}">Levels</a></li>
                <li class="breadcrumb-item active">Lessons</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lessons Table</h5>
                        <div class="d-flex justify-content-end">
                            <a type="button" href="{{ route('admin.level.lesson.create', $level->id) }}"
                                class="btn btn-primary">Create
                                Lesson</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lesson as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ url('storage/lesson', $row->image) }}" alt="image"
                                                    width="120" height="120" style="object-fit: cover;">
                                            </div>
                                        </td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('admin.level.lesson.question.index', [$level->id, $row->id]) }}"
                                                class="btn btn-info text-white">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.level.lesson.edit', [$level->id, $row->id]) }}"
                                                class="btn btn-warning text-white">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('admin.level.lesson.destroy', [$level->id, $row->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteLesson{{ $row->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <div class="modal fade" id="deleteLesson{{ $row->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Lesson - {{ $row->title }}
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Lesson?
                                                                Deleting this Level will also delete all
                                                                <strong>Questions</strong> in this Lesson.
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
