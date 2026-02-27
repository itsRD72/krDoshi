<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Mcq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class McqController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            $role = auth()->user()->role;

            // Staff restrictions
            if ($role == 'staff') {

                $allowedRoutes = [
                    'mcq.index',
                    'mcq.create',
                    'mcq.store',
                    'mcq.edit',
                    'mcq.update',
                    'mcq.paper'
                ];

                if (!in_array($request->route()->getName(), $allowedRoutes)) {
                    return redirect()->route('dashboard')
                        ->with('error', 'You are not allowed to access that page.');
                }
            }

            return $next($request);

        });
    }
    public function mcq(Request $request)
    {
        $courses = DB::table('courses')->get();

        $selectedCourse = session('selected_course');

        return view('admin.add-mcq', compact('courses', 'selectedCourse'));
    }

    public function addMcq(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'correct_option' => 'required|in:A,B,C,D',
            'course_id' => 'required|exists:courses,id',
        ]);

        session(['selected_course' => $request->course_id]);
        
        DB::table('mcqs')->insert([
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_option' => $request->correct_option,
            'course_id' => $request->course_id,
            'created_by' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Mcq added successfully!');
    }


    public function mcqList(Request $request)
    {
        $courses = DB::table('courses')->get();
        $mcqs = collect();

        if ($request->course_id) {

            $mcqs = DB::table('mcqs')
                ->join('courses', 'mcqs.course_id', '=', 'courses.id')
                ->whereNull('mcqs.deleted_at')
                ->where('mcqs.course_id', $request->course_id)
                ->select(
                    'mcqs.id',
                    'mcqs.question',
                    'mcqs.option_a',
                    'mcqs.option_b',
                    'mcqs.option_c',
                    'mcqs.option_d',
                    'mcqs.correct_option'
                )
                ->get();
        }

        return view('admin.mcq-list', compact('mcqs', 'courses'));
    }

    public function editMcq($id)
    {
        $mcq = DB::table('mcqs')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->first();
        if (!$mcq) {
            abort(404);
        }
        $courses = DB::table('courses')->get();
        return view('admin.edit-mcq', compact('mcq', 'courses'));
    }

    public function updateMcq(Request $request, $id)
    {
        $exists = DB::table('mcqs')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->exists();

        if (!$exists) {
            abort(404, 'Mcq not found');
        }

        DB::table('mcqs')
            ->where('id', $id)
            ->update([
                'question' => $request->question,
                'option_a' => $request->option_a,
                'option_b' => $request->option_b,
                'option_c' => $request->option_c,
                'option_d' => $request->option_d,
                'correct_option' => $request->correct_option,
                'course_id' => $request->course_id,
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);

        return redirect()->route('mcq.index')
            ->with('success', 'Mcq updated successfully!');
    }

    public function createPaper(Request $request)
    {
        $request->validate([
            'selected_mcqs' => 'required|array|min:1'
        ]);

        $mcqs = DB::table('mcqs')
            ->whereIn('id', $request->selected_mcqs)
            ->get();

        $course_id = $mcqs->first()->course_id;


        $course = DB::table('courses')
            ->where('id', $course_id)
            ->first();

        $center = null;

        if (auth()->user()->center_id != null) {
            $center = DB::table('centers')
                ->where('id', auth()->user()->center_id)
                ->first();
        }

        return view('admin.paper-print', compact('mcqs', 'course', 'center'));
    }

    public function deleteMcq($id)
    {
        $mcq = DB::table('mcqs')->where('id', $id)->exists();

        if (!$mcq) {
            abort(404, 'Batch not found');
        }

        DB::table('mcqs')
            ->where('id', $id)
            ->update([
                'deleted_by' => auth()->id(),
                'deleted_at' => now(),
            ]);

        return redirect()->route('mcq.index')
            ->with('success', 'Mcq deleted successfully!');
    }
}
