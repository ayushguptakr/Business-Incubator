<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon2.png') }}" type="image/png">


    <title>  {{ config('app.name', 'Business Incubator') }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --dark-color: #2c3e50;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background: #f8f9fa;
        }
        
        .login {
            min-height: 100vh;
        }
        
        .bg-image {
            background-image: url('https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExazl1c2gyZ2plb291ODdtZXU0b2Z1ZzYydDhhZTVxdW0zYng0ajZ2ZSZlcD12MV9naWZzX3NlYXJjaCZjdD1n/iPzTyUHIQwLXpl8FJr/giphy.gif');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .bg-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(44, 62, 80, 0.7);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 10px 2;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .shiny-text {
    font-weight: bold;
    font-size: 2.5rem;
    background: linear-gradient(
        90deg,
        #3498db, /* your primary color */
        #5dade2, /* lighter blue */
        #2980b9, /* deeper blue */
        #3498db
    );
    background-size: 300% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shine 4s linear infinite;
    text-align: center;
    margin-top: 20px;

}

@keyframes shine {
    0% {
        background-position: 0% center;
    }
    100% {
        background-position: 300% center;
    }
}




        
        /* Add this new animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-form {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body>
    @yield('content')
    
    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>