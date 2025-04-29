@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="display-4" style="color: var(--primary-color);">About Us</h1>
        <p class="lead text-muted">Empowering Startups, Building the Future</p>
    </div>

    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset('images/about-us.png') }}" alt="About Us" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">Who We Are</h2>
            <p class="text-muted">
                The Business Incubator Platform is dedicated to nurturing innovative ideas and helping startups thrive. 
                Our mission is to provide entrepreneurs with mentorship, resources, and funding to turn their dreams into successful ventures.
            </p>

            <h2 class="mb-3 mt-4">What We Offer</h2>
            <ul class="list-unstyled text-muted">
                <li><i class="fas fa-check-circle text-primary me-2"></i> Expert Mentorship</li>
                <li><i class="fas fa-check-circle text-primary me-2"></i> Access to Funding Opportunities</li>
                <li><i class="fas fa-check-circle text-primary me-2"></i> Modern Co-Working Spaces</li>
                <li><i class="fas fa-check-circle text-primary me-2"></i> Networking and Events</li>
                <li><i class="fas fa-check-circle text-primary me-2"></i> Startup Workshops</li>
            </ul>
        </div>
    </div>

    <!-- Counters Section -->
    <div class="row text-center mb-5">
        <div class="col-md-3 mb-4">
            <h2 class="text-primary counter" data-target="100">20+</h2>
            <p class="text-muted">Startups Supported</p>
        </div>
        <div class="col-md-3 mb-4">
            <h2 class="text-primary counter" data-target="50">50+</h2>
            <p class="text-muted">Experienced Mentors</p>
        </div>
        <div class="col-md-3 mb-4">
            <h2 class="text-primary counter" data-target="25">30+</h2>
            <p class="text-muted">Funding Partners</p>
        </div>
        <div class="col-md-3 mb-4">
            <h2 class="text-primary counter" data-target="300">10+</h2>
            <p class="text-muted">Events Conducted</p>
        </div>
    </div>

    <div class="text-center">
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Get in Touch</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Counter Animation
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        counter.innerText = '0';
        const updateCounter = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / 100; // Adjust speed here

            if(count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCounter, 20); // 20ms delay
            } else {
                counter.innerText = target;
            }
        };
        updateCounter();
    });
});
</script>
@endsection
