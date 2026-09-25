<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::with('instructor')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('courses.create', [
            'instructors' => Instructor::orderBy('name')->get(),
        ]);
    }

    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('courses', 'public');
        }
        unset($data['image']);

        $course = Course::create($data);

        return redirect()->route('courses.show', $course)->with('status', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course,
            'instructors' => Instructor::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Burahin ang dating image kung mayroon man
            if ($course->image_path) {
                Storage::disk('public')->delete($course->image_path);
            }
            $data['image_path'] = $request->file('image')->store('courses', 'public');
        }
        unset($data['image']);

        $course->update($data);

        return redirect()->route('courses.show', $course)->with('status', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        if ($course->image_path) {
            Storage::disk('public')->delete($course->image_path);
        }

        $course->delete();

        return redirect()->route('courses.index')->with('status', 'Course deleted successfully.');
    }
}