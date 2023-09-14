<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Contracts\Support\Renderable;
use Modules\Course\Http\Requests\CourseRequest;
use Modules\Lesson\Transformers\CourseResource;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $data = Course::all();
        return CourseResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CourseRequest $request)
    {

        $data = Course::create($request->all());
        return new CourseResource($data);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CourseRequest $request, $id)
    {


        $course = Course::findOrFail($id);
        $course->name = $request->name;
        $course->title = $request->title;
        $course->save();

        return  $this->success("Course update successfully");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return  $this->success("Course deleted successfully");
    }
}
