<?php

namespace Modules\Course\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Repository\CourseRepository;
use Modules\Lesson\Transformers\CourseResource;

class CourseController extends Controller
{

    private CourseRepository $course;

    public function __construct()
    {
        $this->course = new CourseRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data =  $this->course->courses();

        return CourseResource::collection($data);
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $course = $this->course->create($data);

        return new CourseResource($course);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $course = $this->course->findOrFail($id);
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->course->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $course = $this->course->findOrFail($id);
        $course->delete();
    }
}
