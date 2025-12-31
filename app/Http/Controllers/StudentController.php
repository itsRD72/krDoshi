<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-student-form'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $students = Student::create([
            "first_name" => $request->first_name,
            "middle_name" => $request->middle_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "address" => $request->address,
            "village" => $request->village,
            "taluko" => $request->taluko,
            "district" => $request->district,
            //"pin_code" => $request->pin_code,
            "phone_number" => $request->phone_number,
            "parent_email" => $request->parent_email,
            "parent_number" => $request->parent_number,
            "batch_id" => $request->batch_id,

        ]);
        return $students;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
