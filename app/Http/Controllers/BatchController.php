<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $role = auth()->user()->role;


            if ($role === 'staff') {
                $allowedRoutes = [
                    'batchList',
                    'getBatches',
                    'getCourses',
                    'editBatch',
                    'updateBatch',
                ];

                if (!in_array($request->route()->getActionMethod(), $allowedRoutes)) {
                    return redirect()->route('dashboard')
                        ->with('error', 'You are not allowed to access that page.');
                }
            }

            return $next($request);
        });
    }

    public function batch()
    {
        $centers = auth()->user()->role === 'admin'
            ? DB::table('centers')->get()
            : DB::table('centers')->where('id', auth()->user()->center_id)->get();

        $courses = DB::table('courses')->get();

        return view('admin.add-batch', compact('centers', 'courses'));
    }

    public function addBatch(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'course_id' => 'required|exists:courses,id',
            'center_id' => auth()->user()->role === 'admin'
                ? 'required|exists:centers,id'
                : 'nullable',
        ]);

        $center_id = auth()->user()->role === 'admin'
            ? $request->center_id
            : auth()->user()->center_id;

        DB::table('batches')->insert([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'course_id' => $request->course_id,
            'center_id' => $center_id,
            'created_by' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Batch added successfully!');
    }

    public function batchList(Request $request)
    {
        $search = $request->search;

        $query = DB::table('batches')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->join('centers', 'batches.center_id', '=', 'centers.id')
            ->leftJoin('students', function ($join) {
                $join->on('batches.id', '=', 'students.batch_id')
                    ->whereNull('students.deleted_at');
            })
            ->whereNull('batches.deleted_at');

       
        if (auth()->user()->role === 'staff') {
            $query->where('batches.center_id', auth()->user()->center_id);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('batches.name', 'like', "%$search%")
                    ->orWhere('courses.name', 'like', "%$search%")
                    ->orWhere('centers.name', 'like', "%$search%")
                    ->orWhere('batches.start_date', 'like', "%$search%");
            });
        }

        $batches = $query->select(
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
            ->paginate(20)
            ->appends(['search' => $search]);

        return view('admin.batch-list', compact('batches'));
    }

    public function editBatch($id)
    {
        $query = DB::table('batches')->where('id', $id)->whereNull('deleted_at');

        if (auth()->user()->role === 'staff') {
            $query->where('center_id', auth()->user()->center_id);
        }

        $batch = $query->first();
        if (!$batch) {
            return redirect()->route('dashboard')
                ->with('error', 'You are not allowed to access that page.');
        }

        $courses = DB::table('courses')->get();
        $centers = DB::table('centers')->get();

        return view('admin.edit-batch', compact('batch', 'courses', 'centers'));
    }

    public function updateBatch(Request $request, $id)
    {
        $query = DB::table('batches')->where('id', $id)->whereNull('deleted_at');

        if (auth()->user()->role === 'staff') {
            $query->where('center_id', auth()->user()->center_id);
        }

        $exists = $query->exists();
        if (!$exists) {
            return redirect()->route('dashboard')
                ->with('error', 'You are not allowed to access that page.');
        }

        $center_id = auth()->user()->role === 'admin'
            ? $request->center_id
            : auth()->user()->center_id;

        DB::table('batches')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'course_id' => $request->course_id,
                'center_id' => $center_id,
                'start_date' => $request->start_date,
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);

        return redirect()->route('batch.index')
            ->with('success', 'Batch updated successfully!');
    }

    public function deleteBatch($id)
    {
        $query = DB::table('batches')->where('id', $id)->whereNull('deleted_at');

        if (auth()->user()->role === 'staff') {
            $query->where('center_id', auth()->user()->center_id);
        }

        $exists = $query->exists();
        if (!$exists) {
            return redirect()->route('dashboard')
                ->with('error', 'You are not allowed to access that page.');
        }

        DB::table('batches')
            ->where('id', $id)
            ->update([
                'deleted_by' => auth()->id(),
                'deleted_at' => now(),
            ]);

        return redirect()->route('batch.index')
            ->with('success', 'Batch deleted successfully!');
    }

    public function getBatches($centerId, $courseId)
    {
        $query = DB::table('batches')
            ->where('course_id', $courseId)
            ->whereDate('start_date', '>=', now())
            ->whereNull('deleted_at');

        if (auth()->user()->role === 'staff') {
            $query->where('center_id', auth()->user()->center_id);
        } else {
            $query->where('center_id', $centerId);
        }

        $batches = $query->select('id', 'name', 'start_date')->get();
        return response()->json($batches);
    }

    public function getCourses()
    {
        $courses = DB::table('courses')->get();
        return response()->json($courses);
    }
}