<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{



    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function createStaff()
    {
        $authUser = auth()->user();

        if ($authUser->role === 'admin') {
            $centersWithCoordinator = DB::table('users')
                ->where('role', 'coordinator')
                ->whereNull('deleted_at')
                ->pluck('center_id');

            $allCenters = DB::table('centers')
                ->whereNull('deleted_at')
                ->get();

            $centersWithoutCoordinator = DB::table('centers')
                ->whereNull('deleted_at')
                ->whereNotIn('id', $centersWithCoordinator)
                ->get();

        } else {

            $allCenters = DB::table('centers')
                ->where('id', $authUser->center_id)
                ->get();

            $centersWithoutCoordinator = $allCenters;
        }

        return view('admin.add-staff', compact('allCenters', 'centersWithoutCoordinator'));
    }

    public function addStaff(Request $request)
    {
        $rules = [
            'role' => 'required|in:admin,coordinator,staff',
            'center_id' => 'nullable|exists:centers,id',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];

        if ($request->role !== 'admin') {
            $rules = array_merge($rules, [
                'first_name' => 'required|string',
                'middle_name' => 'nullable|string',
                'last_name' => 'required|string',
                'address' => 'nullable|string',
                'village' => 'nullable|string',
                'taluko' => 'nullable|string',
                'district' => 'nullable|string',
                'center_id' => 'required|exists:centers,id',
            ]);
        }

        $validated = $request->validate($rules);
        if ($request->role === 'coordinator') {

            $exists = DB::table('users')
                ->where('role', 'coordinator')
                ->where('center_id', $request->center_id)
                ->whereNull('deleted_at')
                ->exists();

            if ($exists) {
                return back()
                    ->withInput()
                    ->withErrors(['center_id' => 'This center already has a coordinator.']);
            }
        }

        DB::table('users')->insert([
            'role' => $request->role,
            'center_id' => $request->role === 'admin' ? null : $request->center_id,
            'first_name' => $request->role === 'admin' ? null : $request->first_name,
            'middle_name' => $request->role === 'admin' ? null : $request->middle_name,
            'last_name' => $request->role === 'admin' ? null : $request->last_name,
            'village' => $request->role === 'admin' ? null : $request->village,
            'taluko' => $request->role === 'admin' ? null : $request->taluko,
            'district' => $request->role === 'admin' ? null : $request->district,
            'address' => $request->role === 'admin' ? null : $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_by' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Staff added successfully!');
    }

    public function staffList(Request $request)
    {
        $search = $request->search;
        $authUser = auth()->user();

        $users = DB::table('users')
            ->leftJoin('centers', 'users.center_id', '=', 'centers.id')
            ->whereNull('users.deleted_at')
            ->when($authUser->role === 'coordinator' || $authUser->role === 'staff', function ($query) use ($authUser) {
                $query->where('users.center_id', $authUser->center_id);
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('first_name', 'like', '%' . $search . '%')
                        ->orWhere('last_name', 'like', '%' . $search . '%')
                        ->orWhere('role', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('centers.name', 'like', '%' . $search . '%');
                });
            })
            ->select('users.*', 'centers.name as center_name')
            ->paginate(20)
            ->appends(['search' => $search]);

        return view('admin.staff-list', compact('users'));
    }

    public function editStaff($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user)
            abort(404);

        $centers = DB::table('centers')->whereNull('deleted_at')->get();

        return view('admin.edit-staff', compact('user', 'centers'));
    }

    public function updateStaff(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,coordinator,staff',
            'center_id' => 'nullable|exists:centers,id',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        if ($request->role === 'coordinator') {

            $exists = DB::table('users')
                ->where('role', 'coordinator')
                ->where('center_id', $request->center_id)
                ->whereNull('deleted_at')
                ->where('id', '!=', $id) // exclude current user
                ->exists();

            if ($exists) {
                return back()
                    ->withInput()
                    ->withErrors(['center_id' => 'This center already has a coordinator.']);
            }
        }

        $user = [
            'role' => $request->role,
            'center_id' => $request->role === 'admin' ? null : $request->center_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'village' => $request->village,
            'taluko' => $request->taluko,
            'district' => $request->district,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ];

        if ($request->password) {
            $user['password'] = bcrypt($request->password);
        }

        DB::table('users')->where('id', $id)->update($user);

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully!');
    }

    public function viewStaff($id)
    {
        $staff = DB::table('users')
            ->leftJoin('centers', 'users.center_id', '=', 'centers.id')
            ->whereNull('users.deleted_at')
            ->where('users.id', $id)
            ->select('users.*', 'centers.name')
            ->first();

        return view('admin.staff-view', compact('staff'));
    }
    public function deleteStaff($id)
    {
        $exists = DB::table('users')->where('id', $id)->exists();
        if (!$exists)
            abort(404, 'Staff not found');

        DB::table('users')->where('id', $id)->update([
            'deleted_by' => auth()->id(),
            'deleted_at' => now(),
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully!');
    }
}