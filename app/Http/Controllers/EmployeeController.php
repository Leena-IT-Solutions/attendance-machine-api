<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = auth()->user()->employees()->latest()->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'code'  => 'required|string|max:50',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required'  => 'Employee name is required.',
            'code.required'  => 'Employee code is required.',
            'photo.required' => 'A profile photo is required.',
            'photo.image'    => 'The photo must be an image file.',
            'photo.mimes'    => 'The photo must be a JPEG, PNG, or JPG file.',
            'photo.max'      => 'The photo must not exceed 2MB.',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        auth()->user()->employees()->create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        $this->authorizeEmployee($employee);
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $this->authorizeEmployee($employee);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $this->authorizeEmployee($employee);

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'code'  => 'required|string|unique:employees,code,' . $employee->id,
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                \Storage::disk('public')->delete($employee->photo);
            }
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $this->authorizeEmployee($employee);

        if ($employee->photo) {
            \Storage::disk('public')->delete($employee->photo);
        }
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

    public function list(Request $request)
    {
        return response()->json(
            auth()->user()->employees()->get(['name', 'code', 'photo'])->map(function ($emp) {
                return [
                    'name'      => $emp->name,
                    'code'      => $emp->code,
                    'photo'     => $emp->photo,
                    'photo_url' => $emp->photo ? asset('storage/' . $emp->photo) : null,
                ];
            })
        );
    }

    private function authorizeEmployee(Employee $employee): void
    {
        if ($employee->user_id !== auth()->id()) {
            abort(403);
        }
    }
}
