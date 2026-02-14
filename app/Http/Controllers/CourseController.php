<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    public function course()
    {
        return view('admin.add-course');
    }

    public function addCourse(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'max_student' => 'required|numeric|min:1',
            'length_in_week' => 'required|numeric|min:1',
            'is_avail_sunday' => 'nullable|boolean',
        ]);

        $course = DB::table('courses')->insert([
            'name' => $request->name,
            'max_student' => $request->max_student,
            'length_in_week' => $request->length_in_week,
            'is_avail_sunday' => $request->has('is_avail_sunday') ? 1 : 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($course) {
            return back()->with('success', 'Course Added successfully!');
        }
        return back()->with('error', 'Something went wrong!');
    }

    public function courseList()
    {
       $courses = DB::table('courses')->get();

        return view('admin.course-list', compact('courses'));
    }

    public function editCourse($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();

        if (!$course) {
            abort(404);
        }
        return view('admin.edit-course', compact('course'));
    }

    public function updateCourse(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_student' => 'required|numeric|min:1',
            'length_in_week' => 'required|numeric|min:1',
            'is_avail_sunday' => 'nullable|boolean',
        ]);

        $updated = DB::table('courses')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'max_student' => $request->max_student,
                'length_in_week' => $request->length_in_week,

                'is_avail_sunday' => $request->has('is_avail_sunday') ? 1 : 0,

                'updated_at' => now(),
            ]);

        if ($updated) {
            return redirect()
                ->route('course-list-page')
                ->with('success', 'Course updated successfully!');
        }

        return back()->with('error', 'Update failed!');
    }

    public function deleteCourse($id)
    {
        $course = DB::table('courses')->where('id', $id)->exists();

        if (!$course) {
            abort(404, 'Course not found');
        }

        DB::table('courses')
            ->where('id', $id)
            ->update([
                'deleted_by' => auth()->id(),
                'deleted_at' => now(),
            ]);

        return redirect()->route('course-list-page')
            ->with('success', 'Course deleted successfully!');
    }
}
