@extends('layouts.auth')

@section('title', 'Reset Password')

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
                        <div class="col-lg-10 col-xl-7 mx-auto animate-form">
                            <div class="text-center mb-4">
                                <img src="{{ asset('images/logo.png') }}" alt="Business Incubator Logo" class="mb-3" style="height: 60px;">
                                <h2 class="font-weight-bold text-primary">Set New Password</h2>
                                <p class="text-muted">Create a strong, secure password</p>
                            </div>
                            
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group mb-3">
                                    <input id="email" type="email" 
                                           class="form-control rounded-pill border-0 shadow-sm px-4 @error('email') is-invalid @enderror" 
                                           name="email" value="{{ $email ?? old('email') }}" 
                                           required autocomplete="email" autofocus
                                           placeholder="Email address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <input id="password" type="password" 
                                           class="form-control rounded-pill border-0 shadow-sm px-4 @error('password') is-invalid @enderror" 
                                           name="password" required 
                                           placeholder="New Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-4">
                                    <input id="password-confirm" type="password" 
                                           class="form-control rounded-pill border-0 shadow-sm px-4" 
                                           name="password_confirmation" required 
                                           placeholder="Confirm New Password">
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block text-uppercase rounded-pill shadow-sm mb-3">
                                    Reset Password
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
@endsection

// Add to your reset.blade.php
@section('scripts')
<script>
    document.getElementById('password').addEventListener('input', function() {
        let strengthBadge = document.getElementById('strengthBadge');
        let strength = 0;
        let password = this.value;
        
        // Check length
        if (password.length >= 8) strength++;
        // Check for numbers
        if (password.match(/([0-9])/)) strength++;
        // Check for special chars
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength++;
        // Check for uppercase
        if (password.match(/([A-Z])/)) strength++;
        
        
        const strengthText = ['Very Weak', 'Weak', 'Medium', 'Strong', 'Very Strong'];
        const strengthClass = ['danger', 'warning', 'info', 'primary', 'success'];
        
        if (password.length > 0) {
            strengthBadge.textContent = strengthText[strength];
            strengthBadge.className = 'badge bg-' + strengthClass[strength];
            strengthBadge.style.display = 'inline-block';
        } else {
            strengthBadge.style.display = 'none';
        }
    });
</script>
@endsection