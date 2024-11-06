<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($levelID, $lessonID, $questionID)
    {
        $level = Level::findOrFail($levelID);
        $lesson = Lesson::findOrFail($lessonID);
        $question = Question::findOrFail($questionID);
        $answer = Answer::where('question_id', $question->id)->oldest()->get();

        return view('admin.answer.index', compact('level', 'lesson', 'question', 'answer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($levelID, $lessonID, $questionID)
    {
        $level = Level::findOrFail($levelID);
        $lesson = Lesson::findOrFail($lessonID);
        $question = Question::findOrFail($questionID);


        return view('admin.answer.create', compact('level', 'lesson', 'question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $levelID, $lessonID, $questionID)
    {
        $this->validate($request, [
            'answer' => 'required',
            'status' => 'required|in:CORRECT,WRONG',
        ]);

        try {
            $level = Level::findOrFail($levelID);
            $lesson = Lesson::findOrFail($lessonID);
            $question = Question::findOrFail($questionID);

            $data = $request->all();

            $data['question_id'] = $question->id;

            Answer::create($data);

            return redirect()->route('admin.level.lesson.question.answer.index', [$level->id, $lesson->id, $question->id])->with('success', 'Answer successfully created');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Answer failed to create');
            // dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($levelID, $lessonID, $questionID, string $id)
    {
        $level = Level::findOrFail($levelID);
        $lesson = Lesson::findOrFail($lessonID);
        $question = Question::findOrFail($questionID);
        $answer = Answer::findOrFail($id);

        return view('admin.answer.edit', compact('level', 'lesson', 'question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $levelID, $lessonID, $questionID, string $id)
    {
        $this->validate($request, [
            'answer' => 'required',
            'status' => 'required|in:CORRECT,WRONG',
        ]);

        try {
            $level = Level::findOrFail($levelID);
            $lesson = Lesson::findOrFail($lessonID);
            $question = Question::findOrFail($questionID);
            $answer = Answer::findOrFail($id);

            $data = $request->all();

            $data['question_id'] = $question->id;

            $answer->update($data);

            return redirect()->route('admin.level.lesson.question.answer.index', [$level->id, $lesson->id, $question->id])->with('success', 'Answer successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Answer failed to update');
            // dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($levelID, $lessonID, $questionID, string $id)
    {
        try {
            $level = Level::findOrFail($levelID);
            $lesson = Lesson::findOrFail($lessonID);
            $question = Question::findOrFail($questionID);
            $answer = Answer::find($id);

            $answer->delete();

            return redirect()->route('admin.level.lesson.question.answer.index', [$level->id, $lesson->id, $question->id])->with('success', 'Answer successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Answer failed to delete');
            // dd($e);
        }
    }
}
