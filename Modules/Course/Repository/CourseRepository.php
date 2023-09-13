<?php

namespace Modules\Course\Repository;

use App\Models\Course;

class CourseRepository
{

    /***
     * Get all courses 
     */
    public function courses()
    {
        return Course::all();
    }

    /***
     * Get A SingleCourses 
     */
    public function findOrFail($id)
    {
        return Course::findOrFail($id);
    }

    /**
     * create course
     */
    public function create($data)
    {
        return Course::create($data);
    }

    /**
     * Course Update
     *
     */
    public function update($id, $data)
    {
        $course = $this->findOrFail($id);
        return  $course->update($data);
    }
}
