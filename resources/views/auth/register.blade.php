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
                                <img src="{{ asset('images/logo.png') }}" alt="Business Incubator Logo" class="mb-3 animate-float" style="height: 60px;">
                                <h2 class="font-weight-bold text-primary">Join Our Incubator</h2>
                                <p class="text-muted">Start your entrepreneurial journey today</p>
                            </div>
                            
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                
                                <div class="form-group mb-3">
                                    <input id="name" type="text" 
                                           class="form-control rounded-pill border-0 shadow-sm px-4 @error('name') is-invalid @enderror" 
                                           name="name" value="{{ old('name') }}" 
                                           required autocomplete="name" autofocus
                                           placeholder="Full Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <input id="email" type="email" 
                                           class="form-control rounded-pill border-0 shadow-sm px-4 @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email') }}" 
                                           required autocomplete="email"
                                           placeholder="Email Address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <input id="password" type="password" 
                                           class="form-control rounded-pill border-0 shadow-sm px-4 @error('password') is-invalid @enderror" 
                                           name="password" required autocomplete="new-password"
                                           placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <input id="password-confirm" type="password" 
                                           class="form-control rounded-pill border-0 shadow-sm px-4" 
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="Confirm Password">
                                </div>
                                
                                <div class="form-group mb-4">
                                    <select name="role" class="form-control rounded-pill border-0 shadow-sm px-4" required>
                                        <option value="">I am registering as...</option>
                                        <option value="startup">Startup Founder</option>
                                        <option value="mentor">Mentor/Investor</option>
                                        <option value="incubator">Incubator Manager</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block text-uppercase rounded-pill shadow-sm mb-3">
                                    Create Account
                                </button>
                                
                                <div class="text-center">
                                    <p class="small text-muted">By registering, you agree to our <a href="#">Terms</a> and <a href="#">Privacy Policy</a></p>
                                </div>
                                
                                <hr class="my-4">
                                
                                <div class="text-center">
                                    <p class="text-muted">Already have an account?</p>
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-block text-uppercase rounded-pill shadow-sm">
                                        Sign In
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