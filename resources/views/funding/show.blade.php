@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Funding Opportunity</div>

                <div class="card-body">
                    <h3>{{ $funding->title }}</h3>
                    <p><strong>Amount:</strong> ${{ number_format($funding->amount, 2) }}</p>
                    <p><strong>Deadline:</strong> {{ $funding->deadline->format('M d, Y') }}</p>
                    <p><strong>Incubator:</strong> 
                        <a href="{{ route('incubators.show', $funding->incubator->id) }}">
                            {{ $funding->incubator->name }}
                        </a>
                    </p>

                    <h4 class="mt-4">Description</h4>
                    <p>{{ $funding->description }}</p>

                    <h4 class="mt-4">Applications</h4>
                    @if($funding->applications->count() > 0)
                        <div class="list-group">
                            @foreach($funding->applications as $application)
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $application->startup->name }}</strong>
                                            <p class="mb-1">{{ Str::limit($application->proposal, 100) }}</p>
                                        </div>
                                        <span class="badge bg-{{ $application->status == 'approved' ? 'success' : ($application->status == 'rejected' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No applications yet.</p>
                    @endif

                    @if(auth()->id() === $funding->incubator->user_id)
                        <div class="mt-4 d-flex">
                            <a href="{{ route('funding.edit', $funding->id) }}" class="btn btn-primary me-2">Edit</a>
                            <form action="{{ route('funding.destroy', $funding->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this funding opportunity?')">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection