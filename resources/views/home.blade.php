@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-body p-5">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold">Welcome to Our Platform</h2>
                        <p class="text-muted">Join our growing community of innovators and mentors</p>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card h-100 border-0 text-center p-4">
                                <div class="card-body">
                                    <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; line-height: 80px;">
                                        <i class="fas fa-lightbulb fa-2x"></i>
                                    </div>
                                    <h5>For Startups</h5>
                                    <p class="text-muted">Find resources, funding, and mentorship to grow your business</p>
                                    <a href="{{ route('startups.index') }}" class="btn btn-outline-primary">Explore</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card h-100 border-0 text-center p-4">
                                <div class="card-body">
                                    <div class="icon-box bg-success bg-opacity-10 text-success rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; line-height: 80px;">
                                        <i class="fas fa-user-tie fa-2x"></i>
                                    </div>
                                    <h5>For Mentors</h5>
                                    <p class="text-muted">Share your expertise and guide the next generation of businesses</p>
                                    <a href="{{ route('mentors.index') }}" class="btn btn-outline-success">Explore</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card h-100 border-0 text-center p-4">
                                <div class="card-body">
                                    <div class="icon-box bg-info bg-opacity-10 text-info rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; line-height: 80px;">
                                        <i class="fas fa-hand-holding-usd fa-2x"></i>
                                    </div>
                                    <h5>Funding</h5>
                                    <p class="text-muted">Discover investment opportunities for your startup</p>
                                    <a href="{{ route('funding.index') }}" class="btn btn-outline-info">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-5">
                        @guest
                            <p class="mb-3">Ready to get started?</p>
                            <a href="{{ route('register') }}" class="btn btn-primary px-4 me-2">Register</a>
                            <a href="{{ route('login') }}" class="btn btn-outline-dark px-4">Login</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection