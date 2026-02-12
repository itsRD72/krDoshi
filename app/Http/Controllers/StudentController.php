<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function student()
    {
        $courses = DB::table('courses')->get();
        $firstCourseId = $courses->first()->id ?? null;

        $batches = $firstCourseId
            ? DB::table('batches')->where('course_id', $firstCourseId)->whereNull('deleted_at')->get()
            : collect(); // empty collection if no course

        return view('admin.add-student', compact('courses', 'batches'));
    }

    public function getBatches($courseId)
    {
        $batches = DB::table('batches')
            ->where('course_id', $courseId)
            ->whereNull('deleted_at')
            ->get();

        return response()->json($batches);
    }

    public function addStudent(Request $request)
    {
        $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'first_name' => 'required|string|max:30',
            'middle_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'address' => 'required|string|max:255',
            'village' => 'required|string|max:30',
            'taluko' => 'required|string|max:30',
            'district' => 'required|string|max:30',

            'phone_number' => 'required|digits_between:10,12',
            'parent_number' => 'required|digits_between:10,12',

            'email' => 'required|email|max:50|unique:students,email',
            'parent_email' => 'required|email|max:50',
        ]);

        DB::table('students')->insert([
            'batch_id' => $request->batch_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'village' => $request->village,
            'taluko' => $request->taluko,
            'district' => $request->district,
            'phone_number' => $request->phone_number,
            'parent_number' => $request->parent_number,
            'email' => $request->email,
            'parent_email' => $request->parent_email,
            'created_by' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Student added successfully!');
    }

    public function studentList()
    {
        $students = DB::table('students')
            ->leftJoin('batches', 'students.batch_id', '=', 'batches.id')
            ->leftJoin('courses', 'batches.course_id', '=', 'courses.id')
            ->whereNull('students.deleted_at')
            ->select(
                'students.*',
                'batches.name as batch_name',
                'courses.name as course_name'
            )
            ->get();

        return view('admin.student-list', compact('students'));
    }

    public function editStudent($id)
    {
        $student = DB::table('students')
            ->leftJoin('batches', 'students.batch_id', '=', 'batches.id')
            ->select('students.*', 'batches.course_id')
            ->where('students.id', $id)
            ->first();
        $courses = DB::table('courses')->get();
        $batches = DB::table('batches')
            ->where('course_id', $student->course_id ?? 0)
            ->get();


        return view('admin.edit-student', compact('student', 'courses', 'batches'));
    }

    public function updateStudent(Request $request, $id)
    {
        $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'first_name' => 'required|string|max:30',
            'middle_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'address' => 'required|string|max:255',
            'village' => 'required|string|max:30',
            'taluko' => 'required|string|max:30',
            'district' => 'required|string|max:30',

            'phone_number' => 'required|digits_between:10,12',
            'parent_number' => 'required|digits_between:10,12',

            'email' => 'required|email|max:50|unique:students,email,' . $id,
            'parent_email' => 'required|email|max:50',
        ]);

        $updated = DB::table('students')
            ->where('id', $id)
            ->update([
                'batch_id' => $request->batch_id,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'village' => $request->village,
                'taluko' => $request->taluko,
                'district' => $request->district,
                'phone_number' => $request->phone_number,
                'parent_number' => $request->parent_number,
                'email' => $request->email,
                'parent_email' => $request->parent_email,
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);

        if ($updated !== false) {
            return redirect()->route('student-list-page')
                ->with('success', 'Student updated successfully!');
        }

        return back()->with('error', 'Update failed!');
    }

    public function viewStudent($id)
    {
        $student = DB::table('students')
            ->join('batches', 'students.batch_id', '=', 'batches.id')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->where('students.id', $id)
            ->whereNull('students.deleted_at')
            ->select(
                'students.*',
                'courses.name as course_name',
                'batches.name as batch_name'
            )
            ->first();

        if (!$student) {
            abort(404);
        }

        return view('admin.student-view', compact('student'));
    }


    public function deleteStudent($id)
    {
        $exists = DB::table('students')->where('id', $id)->exists();

        if (!$exists) {
            abort(404, 'Student not found');
        }

        DB::table('students')
            ->where('id', $id)
            ->update([
                'deleted_by' => auth()->id(),
                'deleted_at' => now(),
            ]);

        return redirect()->route('student-list-page')
            ->with('success', 'Student deleted successfully!');
    }

}
