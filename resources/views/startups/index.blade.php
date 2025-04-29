@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fw-bold" style="color: var(--primary-color);">Startup Directory</h1>
        @auth
            <a href="{{ route('startups.create') }}" class="btn text-white" style="background-color: var(--primary-color);">
                <i class="fas fa-plus me-2"></i> Add New Startup
            </a>
        @endauth
    </div>

    @if($startups->isEmpty())
        <div class="card shadow-sm border-0" style="background-color: var(--light-color);">
            <div class="card-body text-center py-5">
                <i class="fas fa-lightbulb fa-4x mb-4" style="color: var(--secondary-color);"></i>
                <h4 style="color: var(--primary-color);">No Startups Found</h4>
                <p style="color: var(--secondary-color);">Be the first to add your startup to our platform</p>
                @auth
                    <a href="{{ route('startups.create') }}" class="btn text-white mt-3" style="background-color: var(--primary-color);">
                        <i class="fas fa-plus me-2"></i> Create Startup
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
            @foreach($startups as $startup)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 hover-effect" style="border-radius: 10px; overflow: hidden;">

                        @if($startup->logo)
                        @if(Str::startsWith($startup->logo, ['http://', 'https://']))
                            <!-- Use the image URL directly -->
                            <img src="{{ $startup->logo }}" class="card-img-top object-fit-cover" alt="{{ $startup->name }}" style="height: 200px; object-fit: cover;">
                        @else
                            <!-- Use local storage path -->
                            <img src="{{ asset('storage/startups/' . $startup->logo) }}" class="card-img-top object-fit-cover" alt="{{ $startup->name }}" style="height: 200px; object-fit: cover;">
                        @endif
                    @else
                        <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px; background-color: var(--light-color);">
                            <i class="fas fa-building fa-4x" style="color: var(--secondary-color);"></i>
                        </div>
                    @endif
                    


                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0" style="color: var(--primary-color);">{{ $startup->name }}</h5>
                                <span class="badge" style="background-color: 
                                    @if($startup->stage == 'established') var(--primary-color)
                                    @elseif($startup->stage == 'growth') var(--secondary-color)
                                    @elseif($startup->stage == 'seed') var(--accent-color)
                                    @else var(--light-color) @endif;
                                    color: @if($startup->stage == 'established' || $startup->stage == 'growth') white @else var(--text-color) @endif">
                                    {{ ucfirst($startup->stage) }}
                                </span>
                            </div>

                            <p class="mb-3" style="color: var(--secondary-color);">
                                <i class="fas fa-industry me-2"></i>{{ $startup->industry }}
                            </p>

                            <p class="card-text mb-3" style="color: var(--text-light);">{{ Str::limit($startup->description, 100) }}</p>

                            @if($startup->incubator)
                                <div class="d-flex align-items-center small" style="color: var(--secondary-color);">
                                    <i class="fas fa-home me-2"></i>
                                    <span>{{ $startup->incubator->name }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                            <a href="{{ route('startups.show', $startup->id) }}" class="btn btn-sm" style="border: 1px solid var(--primary-color); color: var(--primary-color);">
                                <i class="fas fa-eye me-1"></i> View Details
                            </a>
                            @if(auth()->check() && auth()->user()->id === $startup->user_id)
                                <div class="dropdown">
                                    <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: 1px solid var(--secondary-color); color: var(--secondary-color);">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('startups.edit', $startup->id) }}" style="color: var(--primary-color);">
                                                <i class="fas fa-edit me-2"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('startups.destroy', $startup->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this startup?')">
                                                    <i class="fas fa-trash me-2"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($startups->hasPages())
            <div class="d-flex flex-column align-items-center mt-5">
                {{ $startups->links('vendor.pagination.bootstrap-5') }}
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

    .card-img-top.object-fit-cover {
        object-fit: cover;
    }

    .dropdown-menu {
        min-width: 10rem;
        border: 1px solid rgba(39, 55, 77, 0.1);
    }

    .dropdown-item:hover {
        background-color: var(--light-color);
        color: var(--primary-color) !important;
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