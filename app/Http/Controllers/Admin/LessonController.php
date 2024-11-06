<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Level;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($levelID)
    {
        $level = Level::findOrFail($levelID);
        $lesson = Lesson::where('level_id', $level->id)->oldest()->get();

        return view('admin.lesson.index', compact('level', 'lesson'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($levelID)
    {
        $level = Level::findOrFail($levelID);

        return view('admin.lesson.create', compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $levelID)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'content' => 'required',
        ]);

        try {

            $level = Level::findOrFail($levelID);
            $data = $request->all();

            $data['level_id'] = $level->id;
            $data['slug'] = Str::slug($request->title);

            $image = $request->file('image');
            $image->storeAs('lesson', $image->hashName(), 'public');
            $data['image'] = $image->hashName();

            Lesson::create($data);

            return redirect()->route('admin.level.lesson.index', $level)->with('success', 'Lesson successfully to created');
        } catch (Exception $e) {
            return redirect()->back()->with('errors', 'Lesson failed to create');
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
    public function edit($levelID, string $id)
    {
        $level = Level::findOrFail($levelID);
        $lesson = Lesson::findOrFail($id);

        return view('admin.lesson.edit', compact('level', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $levelID, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        try {
            $level = Level::findOrFail($levelID);
            $lesson = Lesson::findOrFail($id);

            $data = $request->all();

            $data['level_id'] = $level->id;
            $data['slug'] = Str::slug($request->title);

            if (!$request->file('image') == '') {
                Storage::disk('public')->delete('lesson/' . basename($lesson->image));

                $image = $request->file('image');
                $image->storeAs('lesson', $image->hashName(), 'public');
                $data['image'] = $image->hashName();
            }

            $lesson->update($data);

            return redirect()->route('admin.level.lesson.index', $level)->with('success', 'Lesson successfully edited');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Lesson failed to edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($levelID, string $id)
    {
        try {
            $level = Level::findOrFail($levelID);
            $lesson = Lesson::find($id);

            Storage::disk('public')->delete('lesson/' . basename($lesson->image));

            $lesson->delete();

            return redirect()->route('admin.level.lesson.index', $level)->with('success', 'Lesson successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Lesson failed to delete');
        }
    }
}
