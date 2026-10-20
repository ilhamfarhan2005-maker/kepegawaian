<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Eager load department untuk optimasi relasi
        $employees = Employee::with('department')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'position'      => 'required|string|max:255',
            'salary'        => 'required|numeric|min:1',
            'joined_at'     => 'required|date',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'position'      => 'required|string|max:255',
            'salary'        => 'required|numeric|min:1',
            'joined_at'     => 'required|date',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}