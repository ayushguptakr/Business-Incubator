@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fw-bold" style="color: var(--primary-color);">Funding Opportunities</h1>
        @auth
            @if(auth()->user()->incubator)
                <a href="{{ route('funding.create') }}" class="btn text-white" style="background-color: var(--primary-color);">
                    <i class="fas fa-plus me-2"></i> Add Funding
                </a>
            @endif
        @endauth
    </div>

    @if($opportunities->isEmpty())
        <div class="card shadow-sm border-0" style="background-color: var(--light-color);">
            <div class="card-body text-center py-5">
                <i class="fas fa-hand-holding-usd fa-4x mb-4" style="color: var(--secondary-color);"></i>
                <h4 style="color: var(--primary-color);">No Funding Opportunities Available</h4>
                <p style="color: var(--secondary-color);">Check back later or create one if you're an incubator manager</p>
                @auth
                    @if(auth()->user()->incubator)
                        <a href="{{ route('funding.create') }}" class="btn text-white mt-3" style="background-color: var(--primary-color);">
                            <i class="fas fa-plus me-2"></i> Create Opportunity
                        </a>
                    @endif
                @else
                    <a href="{{ route('register') }}" class="btn text-white mt-3" style="background-color: var(--primary-color);">
                        <i class="fas fa-user-plus me-2"></i> Register as Incubator
                    </a>
                @endauth
            </div>
        </div>
    @else
        <div class="row g-4">
            @foreach($opportunities as $opportunity)
                <div class="col-lg-6">
                    <div class="card h-100 shadow-sm border-0 hover-effect" style="border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title mb-3" style="color: var(--primary-color);">{{ $opportunity->title }}</h5>
                            <p class="card-text mb-3" style="color: var(--text-light);">{{ Str::limit($opportunity->description, 150) }}</p>
                            
                            <div class="d-flex align-items-center mb-2" style="color: var(--secondary-color);">
                                <i class="fas fa-rupee-sign me-2"></i>
                                <span>₹{{ number_format($opportunity->amount, 2) }}</span>
                            </div>
                            
                            <div class="d-flex align-items-center mb-2" style="color: var(--secondary-color);">
                                <i class="fas fa-calendar-alt me-2"></i>
                                <span>Deadline: {{ $opportunity->deadline->format('M d, Y') }}</span>
                            </div>
                            
                            <div class="d-flex align-items-center" style="color: var(--secondary-color);">
                                <i class="fas fa-home me-2"></i>
                                <span>Offered by: {{ $opportunity->incubator->name }}</span>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-between">
                            <a href="{{ route('funding.show', $opportunity->id) }}" class="btn btn-sm" style="border: 1px solid var(--primary-color); color: var(--primary-color);">
                                <i class="fas fa-eye me-1"></i> View Details
                            </a>
                            @auth
                                @if(auth()->user()->startup)
                                    <button class="btn btn-sm text-white" style="background-color: var(--secondary-color);" 
                                            data-bs-toggle="modal" data-bs-target="#applyModal{{ $opportunity->id }}">
                                        <i class="fas fa-paper-plane me-1"></i> Apply
                                    </button>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Apply Modal -->
                <div class="modal fade" id="applyModal{{ $opportunity->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: var(--primary-color); color: white;">
                                <h5 class="modal-title">Apply for {{ $opportunity->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('funding.apply', $opportunity->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label" style="color: var(--primary-color);">Select Your Startup</label>
                                        <select class="form-select @error('startup_id') is-invalid @enderror" name="startup_id" required
                                                style="border: 1px solid var(--accent-color);">
                                            <option value="">Select Startup</option>
                                            @if(auth()->user()->startup)
                                                <option value="{{ auth()->user()->startup->id }}">{{ auth()->user()->startup->name }}</option>
                                            @else
                                                <option disabled>No startup linked to your account</option>
                                            @endif
                                        </select>
                                        @error('startup_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" style="color: var(--primary-color);">Proposal *</label>
                                        <textarea class="form-control @error('proposal') is-invalid @enderror" 
                                                  name="proposal" rows="5" required
                                                  style="border: 1px solid var(--accent-color);"></textarea>
                                        @error('proposal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" style="border: 1px solid var(--secondary-color); color: var(--secondary-color);" 
                                            data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn text-white" style="background-color: var(--primary-color);">
                                        <i class="fas fa-paper-plane me-1"></i> Submit Application
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($opportunities->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $opportunities->links('vendor.pagination.bootstrap-5') }}
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

    .modal-content {
        border-radius: 10px;
        overflow: hidden;
    }

    .btn-close {
        filter: invert(1);
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

    .form-select:focus,
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(39, 55, 77, 0.25);
    }

    textarea {
        min-height: 150px;
        resize: vertical;
    }
</style>
@endsection