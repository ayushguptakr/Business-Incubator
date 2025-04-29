@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>

        <!-- The content half -->
        <div class="col-md-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <div class="text-center mb-4">
                                <img src="{{ asset('images/logo.png') }}" alt="Business Incubator Logo" class="mb-3" style="height: 60px;">
                                <h2 class="font-weight-bold text-primary">Reset Your Password</h2>
                                <p class="text-muted">Enter your email to receive a reset link</p>
                            </div>
                            
                            @if (session('status'))
                                <div class="alert alert-success rounded-pill" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                
                                <div class="form-group mb-4">
                                    <input id="email" type="email" 
                                           class="form-control rounded-pill border-0 shadow-sm px-4 @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email') }}" 
                                           required autocomplete="email" autofocus
                                           placeholder="Email address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block text-uppercase rounded-pill shadow-sm mb-4">
                                    Send Password Reset Link
                                </button>
                                
                                <div class="text-center">
                                    <a class="small text-muted" href="{{ route('login') }}">
                                        <i class="fas fa-arrow-left me-1"></i> Back to login
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <div class="text-success mb-4">
                    <i class="fas fa-check-circle fa-5x"></i>
                </div>
                <h3 class="mb-3">Reset Link Sent!</h3>
                <p>We've emailed your password reset link. Please check your inbox.</p>
                <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

@if (session('status'))
    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            });
        </script>
    @endsection
@endif
@endsection