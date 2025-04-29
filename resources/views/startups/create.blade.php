@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Startup</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('startups.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Startup Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="industry" class="form-label">Industry *</label>
                            <input type="text" class="form-control @error('industry') is-invalid @enderror" id="industry" name="industry" value="{{ old('industry') }}" required>
                            @error('industry')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stage" class="form-label">Stage *</label>
                            <select class="form-select @error('stage') is-invalid @enderror" id="stage" name="stage" required>
                                <option value="">Select Stage</option>
                                <option value="idea" {{ old('stage') == 'idea' ? 'selected' : '' }}>Idea Stage</option>
                                <option value="prototype" {{ old('stage') == 'prototype' ? 'selected' : '' }}>Prototype</option>
                                <option value="seed" {{ old('stage') == 'seed' ? 'selected' : '' }}>Seed Stage</option>
                                <option value="growth" {{ old('stage') == 'growth' ? 'selected' : '' }}>Growth Stage</option>
                                <option value="established" {{ old('stage') == 'established' ? 'selected' : '' }}>Established</option>
                            </select>
                            @error('stage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="incubator_id" class="form-label">Incubator</label>
                            <select class="form-select @error('incubator_id') is-invalid @enderror" id="incubator_id" name="incubator_id">
                                <option value="">Select Incubator</option>
                                @foreach($incubators as $incubator)
                                    <option value="{{ $incubator->id }}" {{ old('incubator_id') == $incubator->id ? 'selected' : '' }}>
                                        {{ $incubator->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('incubator_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Startup</button>
                        <a href="{{ route('startups.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection