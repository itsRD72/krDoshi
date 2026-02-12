<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function center()
    {
        return view('admin.add-center');
    }

    public function addCenter(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'village' => 'required|string|max:30',
            'taluko' => 'required|string|max:30',
            'district' => 'required|string|max:30',
            'pin_code' => 'required|digits:6',
            'phone_number' => 'required|digits_between:10,12',
            'email' => 'required|email|max:50|unique:centers,email',
            'coordinator_name' => 'required',
        ]);


        DB::table('centers')->insert([
            'name' => $request->name,
            'address' => $request->address,
            'village' => $request->village,
            'taluko' => $request->taluko,
            'district' => $request->district,
            'pin_code' => $request->pin_code,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'coordinator_name' => $request->coordinator_name,
            'created_by' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Center added successfully!');
    }

    public function centerList()
    {
        $centers = DB::table('centers')
            ->whereNull('deleted_at')
            ->get();

        return view('admin.center-list', compact('centers'));
    }

    public function editCenter($id)
    {
        $center = DB::table('centers')->where('id', $id)->first();

        if (!$center) {
            abort(404);
        }
        return view('admin.edit-center', compact('center'));
    }

    public function updateCenter(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'village' => 'required|string|max:30',
            'taluko' => 'required|string|max:30',
            'district' => 'required|string|max:30',
            'pin_code' => 'required|digits:6',
            'phone_number' => 'required|digits_between:10,12',
            'email' => 'required|email|max:50',
            'coordinator_name' => 'required',
        ]);

        $updated = DB::table('centers')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'address' => $request->address,
                'village' => $request->village,
                'taluko' => $request->taluko,
                'district' => $request->district,
                'pin_code' => $request->pin_code,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'coordinator_name' => $request->coordinator_name,
                'updated_at' => now(),
            ]);

        if ($updated) {
            return redirect()
                ->route('center-list')
                ->with('success', 'Center updated successfully!');
        }

        return back()->with('error', 'Update failed!');
    }

    public function viewCenter($id)
    {
        $center = DB::table('centers')
            ->whereNull('deleted_at')   // if using soft delete manually
            ->first();

        return view('admin.center-view', compact('center'));
    }

    public function deleteCenter($id)
    {
        $center = DB::table('centers')->where('id', $id)->exists();

        if (!$center) {
            abort(404, 'Center not found');
        }

        DB::table('centers')
            ->where('id', $id)
            ->update([
                'deleted_by' => auth()->id(),
                'deleted_at' => now(),
            ]);

        return redirect()->route('center-list')
            ->with('success', 'Center deleted successfully!');
    }
}
