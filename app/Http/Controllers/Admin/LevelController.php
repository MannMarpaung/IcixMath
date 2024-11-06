<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $level = Level::orderBy('level', 'ASC')->get();

        return view('admin.level.index', compact('level'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'level' => 'required',
            'name' => 'required',
        ]);
        
        try {
            $data = $request->all();

            Level::create($data);

            return redirect()->route('admin.level.index')->with('success', 'Level successfully created');
        } catch (Exception $e) {
            // return redirect()->back()->with('error', 'Level failed to create');
            dd($e);
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
    public function edit(string $id)
    {
        $level = Level::findOrFail($id);

        return view('admin.level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'level' => 'required',
            'name' => 'required',
        ]);

        try {
            $level = Level::findOrFail($id);

            $data = $request->all();

            $level->update($data);

            return redirect()->route('admin.level.index')->with('success', 'Level successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Level failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $level = Level::find($id);

            $level->delete();

            return redirect()->route('admin.level.index')->with('success', 'Level successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Level failed to delete');
        }
    }
}
