<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Mcq;
use App\Models\Center;


class ExamController extends Controller
{
    public function setup()
    {
        $courses = Course::all();
        $centers = Center::all();
        return view('admin.exam-setup', compact('courses', 'centers'));
    }

    public function selectQuestions(Request $request)
    {
        $request->validate([
            'center_id' => 'required',
            'course_id' => 'required',
            'number' => 'required|integer|min:1',
            'mode' => 'required'
        ]);

        $course = Course::findOrFail($request->course_id);
        $center = Center::findOrFail($request->center_id);

        if ($request->mode === 'random') {

            $available = Mcq::where('course_id', $request->course_id)->count();

            if ($request->number > $available) {
                return back()->with('error', 'Not enough questions available');
            }

            $mcqs = Mcq::where('course_id', $request->course_id)
                ->inRandomOrder()
                ->limit($request->number)
                ->get();

            return view('admin.paper-print', compact('mcqs', 'course', 'center'));
        }

        $mcqs = Mcq::where('course_id', $request->course_id)->get();

        return view('admin.examby-staff', [
            'mcqs' => $mcqs,
            'number' => $request->number,
            'course' => $course,
            'center' => $center
        ]);
    }


    public function printPaper(Request $request)
    {
        $request->validate([
            'selected_questions' => 'required|array|min:1',
            'course_id' => 'required',
            'center_id' => 'required'
        ]);

        $course = Course::findOrFail($request->course_id);
        $center = Center::findOrFail($request->center_id);

        $mcqs = Mcq::whereIn('id', $request->selected_questions)->get();

        return view('admin.paper-print', compact('mcqs', 'course', 'center'));
    }


}
