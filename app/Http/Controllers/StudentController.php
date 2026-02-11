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
        $batches = DB::table('batches')->get();
        return view('admin.add-student',compact('batches'));
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
            'created_by'    => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Student added successfully!');
    }

}
