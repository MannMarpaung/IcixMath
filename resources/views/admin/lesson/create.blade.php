@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">

        <h1>Lessons of Level "{{ $level->level }}" - Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.index') }}">Levels</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.lesson.index', $level->id) }}">Lessons</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <form action="{{ route('admin.level.lesson.store', $level->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Create Lesson</h5>
                    <form>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" id="title" class="form-control" name="title" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="image" name="image" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea type="text" id="content" class="form-control" name="content" required></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <a href="{{ route('admin.level.lesson.index', $level->id) }}"
                                class="btn btn-secondary">Cancel</a>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </form>
    </section>
@endsection
