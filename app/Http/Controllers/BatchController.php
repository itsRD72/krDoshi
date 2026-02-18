<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{

    public function batch()
    {
        $centers = DB::table('centers')->get();
        //  $courses = DB::table('courses')->get();
        return view('admin.add-batch', compact('centers'));
    }

    public function addBatch(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'course_id' => 'required|exists:courses,id',
            'center_id' => 'required|exists:centers,id',
        ]);

        DB::table('batches')->insert([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'course_id' => $request->course_id,
            'center_id' => $request->center_id,
            'created_by' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Batch added successfully!');
    }


    public function batchList()
    {
        $batches = DB::table('batches')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->join('centers', 'batches.center_id', '=', 'centers.id')
            ->leftJoin('students', function ($join) {
                $join->on('batches.id', '=', 'students.batch_id')
                    ->whereNull('students.deleted_at'); // if soft delete used
            })
            ->whereNull('batches.deleted_at')
            ->select(
                'batches.id',
                'batches.name',
                'batches.start_date',
                'courses.name as course_name',
                'centers.name as center_name',
                DB::raw('COUNT(students.id) as total_students')
            )
            ->groupBy(
                'batches.id',
                'batches.name',
                'batches.start_date',
                'courses.name',
                'centers.name'
            )
            ->get();

        return view('admin.batch-list', compact('batches'));
    }


    public function editBatch($id)
    {
        $batch = DB::table('batches')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->first();
        if (!$batch) {
            abort(404);
        }
        $courses = DB::table('courses')->get();
        $centers = DB::table('centers')->get();
        return view('admin.edit-batch', compact('batch', 'courses', 'centers'));
    }

    public function updateBatch(Request $request, $id)
    {
        $exists = DB::table('batches')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->exists();

        if (!$exists) {
            abort(404, 'Batch not found');
        }

        DB::table('batches')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'course_id' => $request->course_id,
                'center_id' => $request->center_id,
                'start_date' => $request->start_date,
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);

        return redirect()->route('batch-list')
            ->with('success', 'Batch updated successfully!');
    }

    public function deleteBatch($id)
    {
        $batch = DB::table('batches')->where('id', $id)->exists();

        if (!$batch) {
            abort(404, 'Batch not found');
        }

        DB::table('batches')
            ->where('id', $id)
            ->update([
                'deleted_by' => auth()->id(),
                'deleted_at' => now(),
            ]);

        return redirect()->route('batch-list')
            ->with('success', 'Batch deleted successfully!');
    }


    public function getBatches($centerId, $courseId)
    {
        $batches = DB::table('batches')
            ->where('center_id', $centerId)
            ->where('course_id', $courseId)
            ->whereDate('start_date', '>=', now())
            ->whereNull('deleted_at')
            ->select('id', 'name', 'start_date')
            ->get();

        return response()->json($batches);
    }

    public function getCourses($centerId)
    {
        $courses = DB::table('courses')
            ->where('center_id', $centerId)
            ->get();

        return response()->json($courses);
    }

}
