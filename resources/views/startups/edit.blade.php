@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Startup</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('startups.update', $startup->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Startup Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $startup->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $startup->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="industry" class="form-label">Industry *</label>
                            <input type="text" class="form-control @error('industry') is-invalid @enderror" id="industry" name="industry" value="{{ old('industry', $startup->industry) }}" required>
                            @error('industry')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stage" class="form-label">Stage *</label>
                            <select class="form-select @error('stage') is-invalid @enderror" id="stage" name="stage" required>
                                <option value="">Select Stage</option>
                                <option value="idea" {{ old('stage', $startup->stage) == 'idea' ? 'selected' : '' }}>Idea Stage</option>
                                <option value="prototype" {{ old('stage', $startup->stage) == 'prototype' ? 'selected' : '' }}>Prototype</option>
                                <option value="seed" {{ old('stage', $startup->stage) == 'seed' ? 'selected' : '' }}>Seed Stage</option>
                                <option value="growth" {{ old('stage', $startup->stage) == 'growth' ? 'selected' : '' }}>Growth Stage</option>
                                <option value="established" {{ old('stage', $startup->stage) == 'established' ? 'selected' : '' }}>Established</option>
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
                                    <option value="{{ $incubator->id }}" {{ old('incubator_id', $startup->incubator_id) == $incubator->id ? 'selected' : '' }}>
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
                            @if($startup->logo)
                                <div class="mt-2">
                                    <p>Current logo:</p>
                                    <img src="{{ asset('storage/' . $startup->logo) }}" class="img-thumbnail" style="max-height: 100px;">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="remove_logo" name="remove_logo">
                                        <label class="form-check-label" for="remove_logo">
                                            Remove current logo
                                        </label>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update Startup</button>
                        <a href="{{ route('startups.show', $startup->id) }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection