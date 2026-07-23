<?php

namespace App\Http\Controllers;

use App\Models\DemoRequest;
use Illuminate\Http\Request;

class DemoRequestController extends Controller
{
    public function index()
    {
        $requests = DemoRequest::latest()->paginate(15);
        return view('demo_requests.index', compact('requests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type'              => 'nullable|string|max:50',
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'phone'             => 'nullable|string|max:30',
            'subject'           => 'nullable|string|max:255',
            'employee_capacity' => 'nullable|string|max:100',
            'primary_industry'  => 'nullable|string|max:100',
            'comments'          => 'nullable|string',
        ]);

        DemoRequest::create($validated);

        return back()->with('success', 'Your request has been submitted successfully! Our team will contact you shortly.');
    }

    public function destroy(DemoRequest $demoRequest)
    {
        $demoRequest->delete();
        return back()->with('success', 'Request deleted successfully.');
    }
}
