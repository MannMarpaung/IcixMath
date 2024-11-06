@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">

        <h1>Levels</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Levels</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Levels Table</h5>
                        <div class="d-flex justify-content-end">
                            <a type="button" href="{{ route('admin.level.create') }}" class="btn btn-primary">Create
                                Level</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($level as $row)
                                    <tr>
                                        <td>{{ $row->level }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('admin.level.lesson.index', $row->id) }}"
                                                class="btn btn-info text-white">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.level.edit', $row->id) }}"
                                                class="btn btn-warning text-white">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            {{-- Delete level --}}
                                            <form action="{{ route('admin.level.destroy', $row->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <!-- Delete Modal -->
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteLevel{{ $row->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <div class="modal fade" id="deleteLevel{{ $row->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Level - {{ $row->level }}
                                                                    {{ $row->name }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Level?
                                                                Deleting this Level will also delete all
                                                                <strong>Lessons</strong> in this Level.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Delete Modal-->
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
