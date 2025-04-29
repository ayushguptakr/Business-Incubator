@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Startup Details</div>

                <div class="card-body">

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

                    {{-- @if($startup->logo)
                        <img src="{{ asset('storage/' . $startup->logo) }}" class="img-fluid mb-3 rounded" alt="{{ $startup->name }}" style="max-height: 300px;">
                    @endif --}}

                    <h3>{{ $startup->name }}</h3>
                    <p><strong>Industry:</strong> {{ $startup->industry }}</p>
                    <p><strong>Stage:</strong> {{ ucfirst($startup->stage) }}</p>
                    @if($startup->incubator)
                        <p><strong>Incubator:</strong> 
                            <a href="{{ route('incubators.show', $startup->incubator->id) }}">
                                {{ $startup->incubator->name }}
                            </a>
                        </p>
                    @endif

                    <h4 class="mt-4">Description</h4>
                    <p>{{ $startup->description }}</p>

                    <h4 class="mt-4">Mentors</h4>
                    @if($startup->mentors->count() > 0)
                        <div class="list-group">
                            @foreach($startup->mentors as $mentor)
                                <a href="{{ route('mentors.show', $mentor->id) }}" class="list-group-item list-group-item-action">
                                    {{ $mentor->name }} - {{ $mentor->expertise }}
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p>No mentors assigned yet.</p>
                    @endif

                    @if(auth()->id() === $startup->user_id)
                        <div class="mt-4 d-flex">
                            <a href="{{ route('startups.edit', $startup->id) }}" class="btn btn-primary me-2">Edit</a>
                            <form action="{{ route('startups.destroy', $startup->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this startup?')">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection