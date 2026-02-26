<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = auth()->user();

            // If no logged-in user, just continue (or redirect to login)
            if (!$user) {
                return redirect()->route('login');
            }

            $role = $user->role;

            // Routes that anyone can access (dashboard, logout, etc.)
            $publicRoutes = ['dashboard', 'login', 'logout'];
            if (in_array($request->route()->getActionMethod(), $publicRoutes)) {
                return $next($request);
            }

            // Staff / coordinator restrictions
            if ($role === 'staff' || $role === 'coordinator') {
                $allowedRoutes = [
                    'staffList',
                    'editStaff',
                    'updateStaff',
                    'viewStaff',
                ];

                if (!in_array($request->route()->getActionMethod(), $allowedRoutes)) {
                    return redirect()->route('dashboard')
                        ->with('error', 'You are not allowed to access that page.');
                }
            }

            return $next($request);
        });
    }
    public function dashboard()
    {
        $totalCenters = DB::table('centers')->count();
        $totalCourses = DB::table('courses')->count();
        $totalBatches = DB::table('batches')->count();
        $totalStudents = DB::table('students')->count();

        return view('admin.dashboard', compact(
            'totalCenters',
            'totalCourses',
            'totalBatches',
            'totalStudents'
        ));
    }
}
