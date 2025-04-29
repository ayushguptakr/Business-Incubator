<?php

namespace App\Http\Controllers;

use App\Models\FundingOpportunity;
use App\Models\Application;
use App\Models\Startup;
use Illuminate\Http\Request;
use App\Models\Incubator;
use Illuminate\Support\Facades\Auth;

class FundingController extends Controller
{
    public function index()
    {
        $opportunities = FundingOpportunity::with('incubator')->paginate(8);
        return view('funding.index', compact('opportunities'));
    }

    public function create()
    {
        $incubators = Incubator::all();
        return view('funding.create', compact('incubators'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'deadline' => 'required|date',
            'incubator_id' => 'required|exists:incubators,id',
        ]);

        FundingOpportunity::create($validated);

        return redirect()->route('funding.index')->with('success', 'Funding opportunity created successfully!');
    }

    public function show(FundingOpportunity $funding)
    {
        return view('funding.show', compact('funding'));
    }

    public function edit(FundingOpportunity $funding)
    {
        $incubators = Incubator::all();
        return view('funding.edit', compact('funding', 'incubators'));
    }

    public function update(Request $request, FundingOpportunity $funding)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'deadline' => 'required|date',
            'incubator_id' => 'required|exists:incubators,id',
        ]);

        $funding->update($validated);

        return redirect()->route('funding.index')->with('success', 'Funding opportunity updated successfully!');
    }

    public function destroy(FundingOpportunity $funding)
    {
        $funding->delete();
        return redirect()->route('funding.index')->with('success', 'Funding opportunity deleted successfully!');
    }

    public function apply(Request $request, FundingOpportunity $funding)
    {
        $request->validate([
            'startup_id' => 'required|exists:startups,id',
            'proposal' => 'required|string',
        ]);

        Application::create([
            'startup_id' => $request->startup_id,
            'funding_opportunity_id' => $funding->id,
            'status' => 'pending',
            'proposal' => $request->proposal,
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }
}