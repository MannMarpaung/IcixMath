@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">

        <h1>Levels - Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.index') }}">Levels</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <form action="{{ route('admin.level.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Create Level</h5>
                    <form>

                        <div class="row mb-3">
                            <label for="level" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <input type="number" id="level" class="form-control" name="level" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="name" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <a href="{{ route('admin.level.index') }}" class="btn btn-secondary">Cancel</a>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </form>
    </section>
@endsection
