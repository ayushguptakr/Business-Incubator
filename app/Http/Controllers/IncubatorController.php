<?php

namespace App\Http\Controllers;

use App\Models\Incubator;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\FundingOpportunity;

class IncubatorController extends Controller
{
    public function index()
    {
        $incubators = Incubator::with('user')->paginate(9);
        return view('incubators.index', compact('incubators'));
    }

    public function create()
    {
        return view('incubators.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'website' => 'nullable|url',
        ]);

        $validated['user_id'] = auth()->id();

        Incubator::create($validated);

        return redirect()->route('incubators.index')->with('success', 'Incubator created successfully!');
    }

    public function show(Incubator $incubator)
    {
        return view('incubators.show', compact('incubator'));
    }

    public function edit(Incubator $incubator)
    {
        return view('incubators.edit', compact('incubator'));
    }

    public function update(Request $request, Incubator $incubator)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'website' => 'nullable|url',
        ]);

        $incubator->update($validated);

        return redirect()->route('incubators.index')->with('success', 'Incubator updated successfully!');
    }

    public function destroy(Incubator $incubator)
    {
        $incubator->delete();
        return redirect()->route('incubators.index')->with('success', 'Incubator deleted successfully!');
    }

    public function dashboard()
    {
        $incubator = Incubator::where('user_id', auth()->id())->firstOrFail();
        $startups = $incubator->startups()->with('user')->get();
        $fundingOpportunities = $incubator->fundingOpportunities;
        $applications = Application::whereIn('startup_id', $startups->pluck('id'))->get();

        return view('incubators.dashboard', compact('incubator', 'startups', 'fundingOpportunities', 'applications'));
    }
}