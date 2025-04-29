@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="display-4" style="color: var(--primary-color);">Contact Us</h1>
        <p class="lead text-muted">We would love to hear from you!</p>
    </div>

    <div class="row">
        <!-- Contact Info -->
        <div class="col-md-6 mb-4">
            <h2 class="mb-4">Get in Touch</h2>
            <p class="text-muted">
                Have questions, ideas, or suggestions? Feel free to contact us through the form or reach us directly through the information provided.
            </p>
            <ul class="list-unstyled">
                <li class="mb-3">
                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                    <strong>Address:</strong> 123 Business Street, Innovation City
                </li>
                <li class="mb-3">
                    <i class="fas fa-envelope text-primary me-2"></i>
                    <strong>Email:</strong> info@businessincubator.com
                </li>
                <li class="mb-3">
                    <i class="fas fa-phone text-primary me-2"></i>
                    <strong>Phone:</strong> +91-9876543210
                </li>
            </ul>

            <!-- Social Icons -->
            <div class="social-icons mt-4">
                <a href="#" class="text-primary mx-2"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="#" class="text-info mx-2"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="#" class="text-danger mx-2"><i class="fab fa-youtube fa-2x"></i></a>
                <a href="#" class="text-primary mx-2"><i class="fab fa-linkedin fa-2x"></i></a>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-md-6">
            <h2 class="mb-4">Send a Message</h2>
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection
