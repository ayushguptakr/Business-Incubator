<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::with('user')->paginate(9);
        return view('mentors.index', compact('mentors'));
    }

    public function create()
    {
        return view('mentors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'expertise' => 'required|string',
            'linkedin' => 'nullable|url',
        ]);

        $validated['user_id'] = auth()->id();

        Mentor::create($validated);

        return redirect()->route('mentors.index')->with('success', 'Mentor profile created successfully!');
    }

    public function show(Mentor $mentor)
    {
        return view('mentors.show', compact('mentor'));
    }

    public function edit(Mentor $mentor)
    {
        return view('mentors.edit', compact('mentor'));
    }

    public function update(Request $request, Mentor $mentor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'expertise' => 'required|string',
            'linkedin' => 'nullable|url',
        ]);

        $mentor->update($validated);

        return redirect()->route('mentors.index')->with('success', 'Mentor profile updated successfully!');
    }

    public function destroy(Mentor $mentor)
    {
        $mentor->delete();
        return redirect()->route('mentors.index')->with('success', 'Mentor profile deleted successfully!');
    }

    public function connectToStartup(Request $request, Mentor $mentor)
    {
        $request->validate([
            'startup_id' => 'required|exists:startups,id',
        ]);

        $mentor->startups()->attach($request->startup_id);

        return back()->with('success', 'Mentor connected to startup successfully!');
    }
}