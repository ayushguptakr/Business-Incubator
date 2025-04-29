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
                                <h2 class="shiny-text">Business Incubator Platform</h2>
                                <p class="text-muted">Empower your startup journey</p>
                            </div>
                            
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                
                                <div class="form-group mb-3">
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
                                
                                <div class="form-group mb-3">
                                    <input id="password" type="password" 
                                           class="form-control rounded-pill border-0 shadow-sm px-4 @error('password') is-invalid @enderror" 
                                           name="password" required autocomplete="current-password"
                                           placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Remember me</label>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block text-uppercase rounded-pill shadow-sm mb-3">
                                    Sign in
                                </button>
                                
                                @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a class="small text-muted" href="{{ route('password.request') }}">
                                            Forgot password?
                                        </a>
                                    </div>
                                @endif
                                
                                <hr class="my-4">
                                
                                <div class="text-center">
                                    <p class="text-muted">Don't have an account?</p>
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-block text-uppercase rounded-pill shadow-sm">
                                        Create an account
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