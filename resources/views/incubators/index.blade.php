@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fw-bold" style="color: var(--primary-color);">Incubator Directory</h1>
        @auth
            <a href="{{ route('incubators.create') }}" class="btn text-white" style="background-color: var(--primary-color);">
                <i class="fas fa-plus me-2"></i> Add New Incubator
            </a>
        @endauth
    </div>

    @if($incubators->isEmpty())
        <div class="card shadow-sm border-0" style="background-color: var(--light-color);">
            <div class="card-body text-center py-5">
                <i class="fas fa-home fa-4x mb-4" style="color: var(--secondary-color);"></i>
                <h4 style="color: var(--primary-color);">No Incubators Found</h4>
                <p style="color: var(--secondary-color);">Be the first to register an incubator on our platform</p>
                @auth
                    <a href="{{ route('incubators.create') }}" class="btn text-white mt-3" style="background-color: var(--primary-color);">
                        <i class="fas fa-plus me-2"></i> Create Incubator
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn text-white mt-3" style="background-color: var(--primary-color);">
                        <i class="fas fa-user-plus me-2"></i> Register to Add
                    </a>
                @endauth
            </div>
        </div>
    @else
        <div class="row g-4">
            @foreach($incubators as $incubator)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 hover-effect" style="border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="color: var(--primary-color);">{{ $incubator->name }}</h5>
                            <p class="card-text mb-3" style="color: var(--text-light);">{{ Str::limit($incubator->description, 100) }}</p>
                            
                            <div class="d-flex align-items-center mb-2" style="color: var(--secondary-color);">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                <span>{{ $incubator->location }}</span>
                            </div>
                            
                            @if($incubator->website)
                                <div class="d-flex align-items-center" style="color: var(--secondary-color);">
                                    <i class="fas fa-globe me-2"></i>
                                    <a href="{{ $incubator->website }}" target="_blank" style="color: var(--accent-color);">
                                        Visit Website
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-between">
                            <a href="{{ route('incubators.show', $incubator->id) }}" class="btn btn-sm" style="border: 1px solid var(--primary-color); color: var(--primary-color);">
                                <i class="fas fa-eye me-1"></i> View Details
                            </a>
                            @if(auth()->id() === $incubator->user_id)
                                <a href="{{ route('incubators.dashboard', $incubator->id) }}" class="btn btn-sm" style="background-color: var(--accent-color); color: white;">
                                    <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        @if($incubators->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $incubators->links('vendor.pagination.bootstrap-5') }}
            </div>
        @endif
    @endif
</div>

<style>
    .hover-effect {
        transition: all 0.3s ease;
        border: 1px solid rgba(39, 55, 77, 0.1);
    }

    .hover-effect:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(39, 55, 77, 0.1);
        border-color: var(--accent-color);
    }

    .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .page-link {
        color: var(--primary-color);
    }

    .page-link:hover {
        color: var(--secondary-color);
    }
</style>
@endsection