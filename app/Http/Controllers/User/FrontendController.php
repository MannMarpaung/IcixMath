<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\User;
use App\Models\UserQuiz;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function index()
    {
        $levels = Level::orderBy('level', 'ASC')->take(10)->get();
        $lessons = Lesson::orderBy('level_id', 'ASC')->take(10)->get();

        return view('frontend.index', compact('levels', 'lessons'));
    }

    public function editProfile()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('frontend.edit_profile', compact('user'));
    }

    public function updateProfile(Request $request, $userID)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $user = User::findOrFail($userID);

        try {
            $data = $request->all();

            if ($request->file('image') != '') {
                if ($user->image != '') {
                    Storage::disk('public')->delete('user/' . basename($user->image));
                }

                $image = $request->file('image');
                $image->storeAs('user', $image->hashName(), 'public');
                $data['image'] = $image->hashName();
            }

            // dd($data);
            $user->update($data);
            return redirect()->route('user.dashboard');
        } catch (Exception $e) {
            // return redirect()->back();
            dd($e);
        }
    }

    public function levels()
    {
        $levels = Level::orderBy('level', 'ASC')->with('lessons')->get();

        return view('frontend.levels', compact('levels'));
    }

    public function lessonDetail($levelID, $lessonSlug)
    {

        $level = Level::findOrFail($levelID);
        $lesson = Lesson::where('slug', $lessonSlug)->firstOrFail();
        $userQuiz = UserQuiz::where([['user_id', Auth::user()->id], ['lesson_id', $lesson->id]])->latest()->get();

        return view('frontend.lesson_detail', compact('level', 'lesson', 'userQuiz'));
    }

    public function lessonQuiz($levelID, $lessonSlug)
    {

        $level = Level::findOrFail($levelID);
        $lesson = Lesson::where('slug', $lessonSlug)->firstOrFail();
        $userQuiz = UserQuiz::where('user_id', Auth::user()->id)->get();

        return view('frontend.quiz', compact('level', 'lesson', 'userQuiz'));
    }

    public function lessonResult($levelID, $lessonSlug, $userQuizID, $plusScore)
    {

        $level = Level::findOrFail($levelID);
        $lesson = Lesson::where('slug', $lessonSlug)->firstOrFail();
        $user_quiz = UserQuiz::findOrFail($userQuizID);
        $plus_score = $plusScore;

        return view('frontend.lesson_result', compact('level', 'lesson', 'user_quiz', 'plus_score'));
    }

    public function leaderboard()
    {
        // 1 - 3
        $topThreeUsers = User::where('role', 'user')
            ->orderBy('total_score', 'desc')
            ->take(3)
            ->get();

        // 4 - 99
        $nextUsers = User::where('role', 'user')
            ->orderBy('total_score', 'desc')
            ->skip(3)
            ->take(96)
            ->get();

        return view('frontend.leaderboard', compact('topThreeUsers', 'nextUsers', 'allUsers'));
    }
}
