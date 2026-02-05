<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'created_by' => auth()->id(),
        ]);

        if ($user) {
            return back()->with('success', 'Register successful!');
        }

    }

    public function staffList()
    {
        $data = User::all();

        return view('admin.staff-list', compact('data'));
    }

    public function editStaff($id)
    {
        $data = User::findOrFail($id);
        return view('admin.edit-staff', compact('data'));
    }

    public function updateStaff(Request $request, $id)
    {
        $data = User::findOrFail($id);

        $data->name = $request->name;
        $data->role = $request->role;

        if ($request->password) {
            $data->password = bcrypt($request->password);
        }

        $data->save();

        return redirect()->route('staff-list-page')
            ->with('success', 'Staff updated successfully!');

    }
}
