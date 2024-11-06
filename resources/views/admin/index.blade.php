@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">

        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">

                    {{-- BIODATA --}}
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Role : {{ Auth::user()->role }}</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Name : {{ Auth::user()->name }}</h6><span
                                            class="text-muted small pt-2 ps-1">Email : {{ Auth::user()->email }}</span>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- COUNT USER --}}
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">User</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $user->where('role', 'user')->count() }} Users</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- COUNT LEVEL --}}
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Level</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bar-chart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $levels->count() }} Levels</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- COUNT LESSON --}}
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Lessons</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $lessons->count() }} Lessons</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- TABLE LESSON --}}
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="card-body pb-0">
                                <h5 class="card-title">Lessons</h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Level</th>
                                            <th scope="col">Lesson</th>
                                            <th scope="col">Questions</th>
                                            <th scope="col">Successful User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lessons as $lesson)
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.level.lesson.index', $lesson->levels->id) }}">{{ $lesson->levels->level }}</a>
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.level.lesson.question.index', [$lesson->levels->id, $lesson->id]) }}">{{ $lesson->title }}</a>
                                                </td>
                                                <td>
                                                    {{ $lesson->questions->count() }}
                                                </td>
                                                <td>
                                                    {{ $lesson->user_quizzes->where('is_completed', true)->unique('user_id')->count() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
