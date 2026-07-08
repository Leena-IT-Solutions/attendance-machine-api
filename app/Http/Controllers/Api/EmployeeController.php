<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = $request->user()->employees()->with('shift')->latest()->get();
        
        return response()->json([
            'employees' => $employees->map(function ($emp) {
                return [
                    'id' => $emp->id,
                    'name' => $emp->name,
                    'code' => $emp->code,
                    'photo_url' => $emp->photo ? asset('storage/' . $emp->photo) : null,
                    'face_signature' => $emp->face_signature,
                    'shift_id' => $emp->shift_id,
                    'shift' => $emp->shift ? [
                        'id' => $emp->shift->id,
                        'name' => $emp->shift->name,
                        'start_time' => substr($emp->shift->start_time, 0, 5),
                        'end_time' => substr($emp->shift->end_time, 0, 5),
                    ] : null,
                ];
            })
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:20|unique:employees,code,NULL,id,user_id,' . $request->user()->id,
            'face_signature' => 'nullable|array',
            'shift_id' => 'nullable|integer|exists:shifts,id,user_id,' . $request->user()->id,
        ]);

        $user = $request->user();
        $currentCount = $user->employees()->count();
        $limit = $user->max_employees ?? 2;
        if ($currentCount >= $limit) {
            return response()->json([
                'message' => 'Employee registration limit of ' . $limit . ' reached. Please upgrade your subscription.'
            ], 422);
        }

        $employee = new Employee($validated);
        $employee->user_id = $user->id;

        if ($request->filled('photo_base64')) {
            $base64Image = $request->input('photo_base64');
            
            // Extract face embedding on server-side using Python microservice
            try {
                $faceService = app(\App\Services\FaceRecognitionService::class);
                $embedding = $faceService->extractEmbedding($base64Image);
                $employee->face_signature = ['straight' => $embedding];
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Face registration failed: ' . $e->getMessage()
                ], 422);
            }

            $image = preg_replace('#^data:image/\w+;base64,#i', '', $base64Image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'employees/' . time() . '_' . $employee->code . '.png';
            Storage::disk('public')->put($imageName, base64_decode($image));
            $employee->photo = $imageName;
        }

        $employee->save();
        $employee->load('shift');

        return response()->json([
            'message' => 'Employee created successfully',
            'employee' => $employee
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        if ($employee->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:20|unique:employees,code,' . $employee->id . ',id,user_id,' . $request->user()->id,
            'face_signature' => 'nullable|array',
            'shift_id' => 'nullable|integer|exists:shifts,id,user_id,' . $request->user()->id,
        ]);

        $employee->fill($validated);

        if ($request->filled('photo_base64')) {
            $base64Image = $request->input('photo_base64');

            // Extract face embedding on server-side using Python microservice
            try {
                $faceService = app(\App\Services\FaceRecognitionService::class);
                $embedding = $faceService->extractEmbedding($base64Image);
                $employee->face_signature = ['straight' => $embedding];
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Face registration failed: ' . $e->getMessage()
                ], 422);
            }

            // Delete old photo
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);
            }

            $image = preg_replace('#^data:image/\w+;base64,#i', '', $base64Image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'employees/' . time() . '_' . $employee->code . '.png';
            Storage::disk('public')->put($imageName, base64_decode($image));
            $employee->photo = $imageName;
        }

        $employee->save();
        $employee->load('shift');

        return response()->json([
            'message' => 'Employee updated successfully',
            'employee' => $employee
        ]);
    }

    public function destroy(Request $request, Employee $employee)
    {
        if ($employee->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }

        $employee->delete();

        return response()->json([
            'message' => 'Employee deleted successfully'
        ]);
    }
}
