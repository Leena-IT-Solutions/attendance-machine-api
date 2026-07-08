<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index(Request $request)
    {
        $shifts = $request->user()->shifts()->get(['id', 'name', 'start_time', 'end_time']);
        
        // Format times to H:i for consistency
        $shifts = $shifts->map(function ($shift) {
            return [
                'id' => $shift->id,
                'name' => $shift->name,
                'start_time' => substr($shift->start_time, 0, 5),
                'end_time' => substr($shift->end_time, 0, 5),
            ];
        });

        return response()->json([
            'status' => 'success',
            'shifts' => $shifts
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $shift = $request->user()->shifts()->create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Shift created successfully',
            'shift' => [
                'id' => $shift->id,
                'name' => $shift->name,
                'start_time' => substr($shift->start_time, 0, 5),
                'end_time' => substr($shift->end_time, 0, 5),
            ]
        ]);
    }

    public function update(Request $request, Shift $shift)
    {
        if ($shift->user_id !== $request->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized'
            ], 403);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'start_time' => 'sometimes|required|date_format:H:i',
            'end_time' => 'sometimes|required|date_format:H:i',
        ]);

        $shift->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Shift updated successfully',
            'shift' => [
                'id' => $shift->id,
                'name' => $shift->name,
                'start_time' => substr($shift->start_time, 0, 5),
                'end_time' => substr($shift->end_time, 0, 5),
            ]
        ]);
    }

    public function destroy(Request $request, Shift $shift)
    {
        if ($shift->user_id !== $request->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized'
            ], 403);
        }

        $shift->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Shift deleted successfully'
        ]);
    }
}
