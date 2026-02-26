<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

       
        $this->middleware(function ($request, $next) {
            $role = auth()->user()->role;

            if ($role === 'staff') {
                $allowedRoutes = [
                    'studentList',
                    'editStudent',
                    'updateStudent',
                    'viewStudent',
                    'getBatchesByCourse' 
                ];

                if (!in_array($request->route()->getActionMethod(), $allowedRoutes)) {
                    return redirect()->route('dashboard')
                        ->with('error', 'You are not allowed to access that page.');
                }
            }

            return $next($request);
        });
    }

    public function student()
    {
        $centers = auth()->user()->role === 'admin'
            ? DB::table('centers')->get()
            : DB::table('centers')->where('id', auth()->user()->center_id)->get();

        $courses = DB::table('courses')->get();

        return view('admin.add-student', compact('centers', 'courses'));
    }

    public function create()
    {
        $courses = DB::table('courses')->get();
        return view('admin.add-student', compact('courses'));
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

    public function studentList(Request $request)
    {
        $search = $request->search;

        $query = DB::table('students')
            ->leftJoin('batches', 'students.batch_id', '=', 'batches.id')
            ->leftJoin('courses', 'batches.course_id', '=', 'courses.id')
            ->whereNull('students.deleted_at');

        
        if (auth()->user()->role === 'staff') {
            $query->where('batches.center_id', auth()->user()->center_id);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('batches.name', 'like', "%$search%")
                  ->orWhere('students.first_name', 'like', "%$search%")
                  ->orWhere('students.last_name', 'like', "%$search%")
                  ->orWhere('students.village', 'like', "%$search%")
                  ->orWhere('students.taluko', 'like', "%$search%");
            });
        }

        $students = $query->select(
            'students.*',
            'batches.name as batch_name',
            'courses.name as course_name'
        )
        ->paginate(20)
        ->appends(['search' => $search]);

        return view('admin.student-list', compact('students'));
    }

    public function editStudent($id)
    {
        $query = DB::table('students')
            ->leftJoin('batches', 'students.batch_id', '=', 'batches.id')
            ->select('students.*', 'batches.course_id', 'batches.center_id')
            ->where('students.id', $id);

        if (auth()->user()->role === 'staff') {
            $query->where('batches.center_id', auth()->user()->center_id);
        }

        $student = $query->first();
        if (!$student) {
            return redirect()->route('dashboard')
                ->with('error', 'You are not allowed to access that page.');
        }

        $courses = DB::table('courses')->get();
        $centers = DB::table('centers')->get();

        $batches = DB::table('batches')
            ->where('course_id', $student->course_id ?? 0)
            ->where('center_id', $student->center_id ?? 0)
            ->whereDate('start_date', '>=', now())
            ->whereNull('deleted_at')
            ->get();

        return view('admin.edit-student', compact('student', 'courses', 'batches', 'centers'));
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

        // Check staff access
        if (auth()->user()->role === 'staff') {
            $studentCenter = DB::table('students')
                ->join('batches', 'students.batch_id', '=', 'batches.id')
                ->where('students.id', $id)
                ->value('batches.center_id');

            if ($studentCenter != auth()->user()->center_id) {
                return redirect()->route('dashboard')
                    ->with('error', 'You are not allowed to access that page.');
            }
        }

        DB::table('students')
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

        return redirect()->route('student.index')
            ->with('success', 'Student updated successfully!');
    }

    public function viewStudent($id)
    {
        $query = DB::table('students')
            ->join('batches', 'students.batch_id', '=', 'batches.id')
            ->join('courses', 'batches.course_id', '=', 'courses.id')
            ->join('centers', 'batches.center_id', '=', 'centers.id')
            ->where('students.id', $id)
            ->whereNull('students.deleted_at');

        if (auth()->user()->role === 'staff') {
            $query->where('centers.id', auth()->user()->center_id);
        }

        $student = $query->select(
            'students.*',
            'courses.name as course_name',
            'batches.name as batch_name',
            'centers.name as center_name'
        )->first();

        if (!$student) {
            return redirect()->route('dashboard')
                ->with('error', 'You are not allowed to access that page.');
        }

        return view('admin.student-view', compact('student'));
    }

    public function deleteStudent($id)
    {
        $student = DB::table('students')->where('id', $id)->whereNull('deleted_at')->first();
        if (!$student) {
            return redirect()->route('student-list-page')->with('error', 'Student not found!');
        }

        if (auth()->user()->role === 'staff') {
            $studentCenter = DB::table('students')
                ->join('batches', 'students.batch_id', '=', 'batches.id')
                ->where('students.id', $id)
                ->value('batches.center_id');

            if ($studentCenter != auth()->user()->center_id) {
                return redirect()->route('dashboard')
                    ->with('error', 'You are not allowed to access that page.');
            }
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