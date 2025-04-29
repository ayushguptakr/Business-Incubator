@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header" style="background-color: var(--primary-color); color: white;">
            <h2 class="mb-0">Incubator Dashboard: {{ $incubator->name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-white mb-3 h-100" style="background-color: var(--primary-color); border-left: 4px solid var(--accent-color);">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-rocket me-2"></i>Startups</h5>
                            <p class="card-text display-4">{{ $startups->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-white mb-3 h-100" style="background-color: var(--secondary-color); border-left: 4px solid var(--light-color);">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-hand-holding-usd me-2"></i>Funding Opportunities</h5>
                            <p class="card-text display-4">{{ $fundingOpportunities->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-white mb-3 h-100" style="background-color: var(--accent-color); border-left: 4px solid var(--secondary-color);">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-file-alt me-2"></i>Applications</h5>
                            <p class="card-text display-4">{{ $applications->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header" style="background-color: var(--light-color); color: var(--primary-color);">
                            <h4 class="mb-0"><i class="fas fa-clock me-2"></i>Recent Startups</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach($startups->take(5) as $startup)
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 py-3">
                                        <a href="{{ route('startups.show', $startup->id) }}" style="color: var(--primary-color);">
                                            {{ $startup->name }}
                                        </a>
                                        <span class="badge rounded-pill" style="background-color: 
                                            @if($startup->stage == 'established') var(--primary-color)
                                            @elseif($startup->stage == 'growth') var(--secondary-color)
                                            @else var(--accent-color) @endif;
                                            color: white">
                                            {{ ucfirst($startup->stage) }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-center mt-3">
                                <a href="{{ route('startups.index') }}" class="btn btn-sm" style="border: 1px solid var(--primary-color); color: var(--primary-color);">
                                    View All Startups
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header" style="background-color: var(--light-color); color: var(--primary-color);">
                            <h4 class="mb-0"><i class="fas fa-tasks me-2"></i>Recent Applications</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach($applications->take(5) as $application)
                                    <li class="list-group-item border-0 py-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong style="color: var(--primary-color);">{{ $application->startup->name }}</strong><br>
                                                <small style="color: var(--text-light);">{{ $application->fundingOpportunity->title }}</small>
                                            </div>
                                            <span class="badge rounded-pill" style="background-color: 
                                                @if($application->status == 'approved') var(--secondary-color)
                                                @elseif($application->status == 'rejected') var(--accent-color)
                                                @else var(--light-color); color: var(--text-color) @endif">
                                                {{ ucfirst($application->status) }}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('funding.create') }}" class="btn text-white" style="background-color: var(--primary-color);">
                    <i class="fas fa-plus me-2"></i> Add Funding Opportunity
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-3px);
    }
    
    .list-group-item {
        transition: background-color 0.2s ease;
    }
    
    .list-group-item:hover {
        background-color: rgba(191, 221, 230, 0.3);
    }
    
    .badge {
        font-weight: 500;
        padding: 0.5em 0.75em;
    }
</style>
@endsection