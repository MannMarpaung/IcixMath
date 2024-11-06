<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Leaderboard;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Question;
use App\Models\User;
use App\Models\UserQuiz;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserQuizController extends Controller
{
    public function store(Request $request, $levelID, $lessonSlug)
    {
        $level = Level::findOrFail($levelID);
        $lesson = Lesson::where('slug', $lessonSlug)->firstOrFail();
        $user = User::where('id', Auth::user()->id)->firstOrFail();

        $correctAnswer = 0;
        $totalQuestion = 0;

        try {

            foreach ($lesson->questions as $question) {
                $totalQuestion++;

                $answerKey = $question->id . '_question';
                if ($request->input($answerKey) == 'CORRECT') {
                    $correctAnswer++;
                }
            }

            $passingAnswer = $totalQuestion;
            for ($i = $totalQuestion; $i >= 5; $i -= 5) {
                $passingAnswer--;
            }

            $score = ($correctAnswer / $totalQuestion) * 100;

            $is_completed = $correctAnswer >= $passingAnswer;

            $data = [
                'user_id' => Auth::user()->id,
                'lesson_id' => $lesson->id,
                'score' => $score,
                'is_completed' => $is_completed,
            ];

            
            
            // Leaderboard
            $highestScore = UserQuiz::where([['user_id', Auth::user()->id], ['lesson_id', $lesson->id]])->max('score');
            $plusScore = 0;
            
            if ($score > $highestScore) {
                $currentTotalScore = Auth::user()->total_score;
                $plusScore = $score - $highestScore;
                $currentTotalScore += $plusScore;
                
                $user->update([
                    'total_score' => $currentTotalScore
                ]);
            }
            
            $user_quiz = UserQuiz::create($data);

            return redirect()->route('user.lessonResult', [$level->id, $lesson->slug, $user_quiz->id, $plusScore]);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
