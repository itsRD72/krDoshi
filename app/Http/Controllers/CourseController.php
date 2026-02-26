<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Only admin can access all methods
        $this->middleware(function ($request, $next) {

            if (auth()->user()->role != 'admin') {
                return redirect()->route('dashboard')
                    ->with('error', 'You are not allowed to access that page.');
            }

            return $next($request);

        })->except(['courseList']); // allow only list for others
    }
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
            'created_by' => auth()->id(),
        ]);

        if ($course) {
            return back()->with('success', 'Course Added successfully!');
        }
        return back()->with('error', 'Something went wrong!');
    }

    public function courseList(Request $request)
    {
        $search = $request->search;
        $courses = DB::table('courses')
            ->leftJoin('batches', function ($join) {
                $join->on('courses.id', '=', 'batches.course_id')
                    ->whereNull('batches.deleted_at')
                    ->whereDate('batches.start_date', '<=', now())
                    ->whereRaw(
                        "DATE_ADD(batches.start_date, INTERVAL courses.length_in_week * 7 DAY) >= ?",
                        [now()]
                    );
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {

                    $query->where('courses.name', 'like', "%$search%");

                });
            })
            ->select(
                'courses.id',
                'courses.name',
                'courses.max_student',
                'courses.length_in_week',
                'courses.is_avail_sunday',
                DB::raw('COUNT(batches.id) as running_batches')
            )
            ->groupBy(
                'courses.id',
                'courses.name',
                'courses.max_student',
                'courses.length_in_week',
                'courses.is_avail_sunday'
            )
            ->paginate(20)
            ->appends(['search' => $search]);

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
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);

        if ($updated) {
            return redirect()
                ->route('course.index')
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

        return redirect()->route('course.index')
            ->with('success', 'Course deleted successfully!');
    }
}
