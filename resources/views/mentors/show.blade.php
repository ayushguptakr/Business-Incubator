@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mentor Profile</div>

                <div class="card-body">
                    <h3>{{ $mentor->name }}</h3>
                    <p><strong>Expertise:</strong> {{ $mentor->expertise }}</p>
                    @if($mentor->linkedin)
                        <p><strong>LinkedIn:</strong> <a href="{{ $mentor->linkedin }}" target="_blank">{{ $mentor->linkedin }}</a></p>
                    @endif

                    <h4 class="mt-4">About</h4>
                    <p>{{ $mentor->bio }}</p>

                    <h4 class="mt-4">Startups Mentoring</h4>
                    @if($mentor->startups->count() > 0)
                        <div class="list-group">
                            @foreach($mentor->startups as $startup)
                                <a href="{{ route('startups.show', $startup->id) }}" class="list-group-item list-group-item-action">
                                    {{ $startup->name }} - {{ $startup->industry }}
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p>Not currently mentoring any startups.</p>
                    @endif

                    @if(auth()->id() === $mentor->user_id)
                        <div class="mt-4 d-flex">
                            <a href="{{ route('mentors.edit', $mentor->id) }}" class="btn btn-primary me-2">Edit</a>
                            <form action="{{ route('mentors.destroy', $mentor->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your mentor profile?')">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection