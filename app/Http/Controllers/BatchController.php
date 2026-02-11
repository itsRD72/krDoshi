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
        $courses = DB::table('courses')->get();
        return view('admin.add-batch', compact('courses'));
    }

    public function addBatch(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        DB::table('batches')->insert([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'course_id' => $request->course_id,
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
            ->whereNull('batches.deleted_at')
            ->select(
                'batches.id',
                'batches.name',
                'batches.start_date',
                'courses.name as course_name'
            )->get();

        return view('admin.batch-list', compact('batches'));
    }

    public function editBatch($id)
    {
        $data = Batch::findOrFail($id);
        return view('admin.edit-batch', compact('data'));
    }

    public function updateBatch(Request $request, $id)
    {
        $data = Batch::findOrFail($id);

        $data->name = $request->name;
        $data->start_date = $request->start_date;
        $data->updated_by = auth()->id();

        $data->save();

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
}
