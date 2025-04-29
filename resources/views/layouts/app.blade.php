<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon2.png') }}" type="image/png">

    <title>{{ config('app.name', 'Business Incubator') }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo2.png') }}" alt="Business Incubator" class="navbar-logo">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('startups.index') }}">Startups</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('incubators.index') }}">Incubators</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mentors.index') }}">Mentors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('funding.index') }}">Funding</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                {{-- <li><a class="dropdown-item" href="#">Profile</a></li> --}}

                                <li>
                                    <!-- Updated: trigger modal -->
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>




    {{-- Hero Section - Only shown on home page --}}
    @if(request()->is('/'))
    <div class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Business Incubator Platform</h1>
            <p class="lead text-highlight">Empowering startups with resources, mentors, and funding opportunities</p>
        </div>
    </div>
    @endif

    <main class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-2">&copy; {{ date('Y') }} Business Incubator Platform. All rights reserved.</p>
            <div class="social-icons">
                <a href="https://www.google.com/" target="_blank" class="text-white mx-2"><i class="fab fa-google"></i></a>
                <a href="https://www.facebook.com/" target="_blank" class="text-white mx-2"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.x.com/" target="_blank" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/" target="_blank" class="text-white mx-2"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.youtube.com/" target="_blank" class="text-white mx-2"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </footer>



<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <!-- Modal Header with Cross -->
        <div class="modal-header">
          <h5 class="modal-title" id="profileModalLabel">My Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
        <!-- Modal Body -->
        <div class="modal-body">
  
          <!-- Display Profile Info (default view) -->
          <div id="profileView">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <button class="btn btn-primary btn-sm" onclick="showEditForm()">Edit Profile</button>
          </div>
  
          <!-- Edit Profile Form (hidden initially) -->
          <div id="profileEdit" style="display: none;">
            <form action="{{ route('profile.update') }}" method="POST">
              @csrf
              @method('PUT')
  
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
              </div>
  
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
              </div>
  
              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Cancel</button>
                <button type="submit" class="btn btn-success">Save Changes</button>
              </div>
            </form>
          </div>
  
        </div>
  
      </div>
    </div>
  </div>
  

    
    <!-- Bootstrap JS -->

    <script>
        function showEditForm() {
          document.getElementById('profileView').style.display = 'none';
          document.getElementById('profileEdit').style.display = 'block';
        }
        
        function cancelEdit() {
          document.getElementById('profileEdit').style.display = 'none';
          document.getElementById('profileView').style.display = 'block';
        }
        </script>
        

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar');
            if (navbar && navbar.classList.contains('fixed-top')) {
                document.body.style.paddingTop = navbar.offsetHeight + 'px';
            }
        });
    </script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>