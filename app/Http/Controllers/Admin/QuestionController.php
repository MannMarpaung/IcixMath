<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($levelID, $lessonID)
    {
        $level = Level::findOrFail($levelID);
        $lesson = Lesson::findOrFail($lessonID);
        $question = Question::where('lesson_id', $lesson->id)->oldest()->get();

        return view('admin.question.index', compact('level', 'lesson', 'question'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($levelID, $lessonID)
    {
        $level = Level::findOrFail($levelID);
        $lesson = Lesson::findOrFail($lessonID);

        return view('admin.question.create', compact('level', 'lesson'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $levelID, $lessonID)
    {
        $this->validate($request, [
            'question' => 'required',
        ]);

        try {
            $level = Level::findOrFail($levelID);
            $lesson = Lesson::findOrFail($lessonID);

            $data = $request->all();
            $data['lesson_id'] = $lesson->id;

            $question = Question::create($data);

            if ($request->has('answer')) {
                foreach ($request->input('answer') as $key => $answer) {
                    $statusIndex = $key + 1;
                    if (isset($request->input('status')[$statusIndex])) {
                        Answer::create([
                            'question_id' => $question->id,
                            'answer' => $answer,
                            'status' => $request->input('status')[$statusIndex]
                        ]);
                    }
                }
            }

            return redirect()->route('admin.level.lesson.question.index', [$level->id, $lesson->id])->with('success', 'Question successfully created');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Question failed to create');
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
    public function edit($levelID, $lessonID, string $id)
    {
        $level = Level::findOrFail($levelID);
        $lesson = Lesson::findOrFail($lessonID);
        $question = Question::findOrFail($id);

        return view('admin.question.edit', compact('level', 'lesson', 'question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $levelID, $lessonID, string $id)
    {
        $this->validate($request, [
            'question' => 'required',
        ]);

        try {
            $level = Level::findOrFail($levelID);
            $lesson = Lesson::findOrFail($lessonID);
            $question = Question::findOrFail($id);


            $data = $request->all();

            $data['lesson_id'] = $lesson->id;

            $question->update($data);

            return redirect()->route('admin.level.lesson.question.index', [$level->id, $lesson->id])->with('success', 'Question successfully updated');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Question failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($levelID, $lessonID, string $id)
    {
        try {
            $level = Level::findOrFail($levelID);
            $lesson = Lesson::findOrFail($lessonID);
            $question = Question::find($id);

            $question->delete();

            return redirect()->route('admin.level.lesson.question.index', [$level->id, $lesson->id])->with('success', 'Question successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Question failed to delete');
        }
    }
}
