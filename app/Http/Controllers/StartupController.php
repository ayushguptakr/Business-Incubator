<?php

namespace App\Http\Controllers;

use App\Models\Startup;
use App\Models\Incubator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StartupController extends Controller
{
    public function index()
    {
        $startups = Startup::with('user', 'incubator')->paginate(9);
        return view('startups.index', compact('startups'));
    }

    public function create()
    {
        $incubators = Incubator::all();
        return view('startups.create', compact('incubators'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'industry' => 'required|string',
            'stage' => 'required|string',
            'incubator_id' => 'nullable|exists:incubators,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
        }

        Startup::create($validated);

        return redirect()->route('startups.index')->with('success', 'Startup created successfully!');
    }

    public function show(Startup $startup)
    {
        return view('startups.show', compact('startup'));
    }

    public function edit(Startup $startup)
    {
        $incubators = Incubator::all();
        return view('startups.edit', compact('startup', 'incubators'));
    }

    public function update(Request $request, Startup $startup)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'industry' => 'required|string',
            'stage' => 'required|string',
            'incubator_id' => 'nullable|exists:incubators,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('startups', 'public');
            $validated['logo'] = $path;
        }

        $startup->update($validated);

        return redirect()->route('startups.index')->with('success', 'Startup updated successfully!');
    }

    public function destroy(Startup $startup)
    {
        $startup->delete();
        return redirect()->route('startups.index')->with('success', 'Startup deleted successfully!');
    }
}