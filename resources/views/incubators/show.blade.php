@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Incubator Details</div>

                <div class="card-body">
                    <h3>{{ $incubator->name }}</h3>
                    <p><strong>Location:</strong> {{ $incubator->location }}</p>
                    @if($incubator->website)
                        <p><strong>Website:</strong> <a href="{{ $incubator->website }}" target="_blank">{{ $incubator->website }}</a></p>
                    @endif

                    <h4 class="mt-4">Description</h4>
                    <p>{{ $incubator->description }}</p>

                    <h4 class="mt-4">Startups in this Incubator</h4>
                    @if($incubator->startups->count() > 0)
                        <div class="list-group">
                            @foreach($incubator->startups as $startup)
                                <a href="{{ route('startups.show', $startup->id) }}" class="list-group-item list-group-item-action">
                                    {{ $startup->name }} - {{ $startup->industry }}
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p>No startups currently in this incubator.</p>
                    @endif

                    <h4 class="mt-4">Funding Opportunities</h4>
                    @if($incubator->fundingOpportunities->count() > 0)
                        <div class="list-group">
                            @foreach($incubator->fundingOpportunities as $funding)
                                <a href="{{ route('funding.show', $funding->id) }}" class="list-group-item list-group-item-action">
                                    {{ $funding->title }} - ${{ number_format($funding->amount) }}
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p>No funding opportunities currently available.</p>
                    @endif

                    @if(auth()->id() === $incubator->user_id)
                        <div class="mt-4 d-flex">
                            <a href="{{ route('incubators.edit', $incubator->id) }}" class="btn btn-primary me-2">Edit</a>
                            <form action="{{ route('incubators.destroy', $incubator->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this incubator?')">Delete</button>
                            </form>
                            <a href="{{ route('incubators.dashboard', $incubator->id) }}" class="btn btn-info ms-2">Dashboard</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection