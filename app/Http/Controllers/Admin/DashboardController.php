<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $lessons = Lesson::get();
        $levels = Level::get();
        $user = User::where('role', 'user')->get();

        return view('admin.index', compact('levels', 'lessons', 'user'));
    }

    public function allUsers() {
        $users = User::where('role', 'user')->latest()->get();

        return view('admin.all_users', compact('users'));
    }
}
