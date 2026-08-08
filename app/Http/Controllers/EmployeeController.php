<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function head(){
        return view('header');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Employee::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('employee.login')->with('success', 'Employee registered successfully. Please login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $employee = Employee::where('email', $request->email)->first();

        if (!$employee || !Hash::check($request->password, $employee->password)) {
            return back()->withInput()->withErrors([
                'login' => 'Invalid email or password.',
            ]);
        }

        $request->session()->regenerate();
        session(['employee_id' => $employee->id]);
        session(['employee_name' => $employee->name]);

        return redirect()->route('employee.dashboard')->with('success', "Welcome back, {$employee->name}!");
    }

    public function logout(Request $request)
    {
        $request->session()->forget([
            'employee_id',
            'employee_name',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('employee.login')
            ->with('success', 'You have been logged out successfully.');
    }
}



