<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'name' => 'Invalid username or password',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function addStaff(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = DB::table('users')->insert([
            'name' => $request->name,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'created_by' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($user) {
            return back()->with('success', 'Staff Added successfully!');
        }
    }

    public function staffList()
    {
        $users = DB::table('users')
            ->whereNull('deleted_at')
            ->get();

        return view('admin.staff-list', compact('users'));
    }

    public function editStaff($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            abort(404);
        }
        return view('admin.edit-staff', compact('user'));
    }

    public function updateStaff(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
        ]);


        $user = [
            'name' => $request->name,
            'role' => $request->role,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ];


        if ($request->password) {
            $user['password'] = bcrypt($request->password);
        }

        $updated = DB::table('users')
            ->where('id', $id)
            ->update($data);

        if ($updated) {
            return redirect()
                ->route('staff-list-page')
                ->with('success', 'Staff updated successfully!');
        }

        return back()->with('error', 'Update failed!');

    }

    public function deleteStaff($id)
    {
        $exists = DB::table('users')->where('id', $id)->exists();

        if (!$exists) {
            abort(404, 'Staff not found');
        }

        DB::table('users')
            ->where('id', $id)
            ->update([
                'deleted_by' => auth()->id(),
                'deleted_at' => now(),
            ]);

        return redirect()->route('staff-list-page')
            ->with('success', 'Staff deleted successfully!');
    }
}
