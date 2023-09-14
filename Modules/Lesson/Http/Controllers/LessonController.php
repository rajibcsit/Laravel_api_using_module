<?php

namespace Modules\Lesson\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\Lesson\Http\Requests\LessonRequest;
use Modules\Lesson\Transformers\LessonResource;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = Lesson::all();
        return LessonResource::collection($data);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(LessonRequest $request)
    {
        $data = $request->all();
        if ($request->file('photo')) {
            $data['photo'] =   Storage::putFile('lesson', $request->file('photo'));
        }
        $store =   Lesson::create($data);

        return new LessonResource($store);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return new LessonResource($lesson);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(LessonRequest $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

        if ($request->file('photo')) {
            if ($lesson->photo) {
                Storage::delete($lesson->photo);
            }
            $lesson->photo =   Storage::putFile('lesson', $request->file('photo'));
        }

        $lesson->title = $request->title;
        $lesson->name = $request->name;
        $lesson->save();

        return  $this->success("Lesson update successfully");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);

        if ($lesson->photo) {
            Storage::delete($lesson->photo);
        }
        $lesson->delete();

        return  $this->success("Lesson deleted successfully");
    }
}
