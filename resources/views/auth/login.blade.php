<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Electra-Link</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            animation: fadeIn 1s ease-in-out;
        }

        .login-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }

        .login-container label {
            font-weight: 500;
            color: #fff;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 1rem;
        }

        .login-container input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.3);
        }

        .login-container .btn {
            width: 100%;
            padding: 12px;
            background: #ff6f61;
            border: none;
            color: #fff;
            font-weight: 500;
            font-size: 1.2rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .login-container .btn:hover {
            background: #ff4a3d;
            transform: translateY(-3px);
        }

        .login-container .forgot-password {
            text-align: center;
            margin-top: 20px;
        }

        .login-container .forgot-password a {
            color: #ffdd57;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-container .forgot-password a:hover {
            color: #ff6f61;
        }

        .login-container .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .login-container .remember-me input {
            width: auto;
            margin-right: 10px;
        }

        .login-container .remember-me label {
            margin: 0;
        }

        /* Error Message Styling */
        .error-message {
            color: #ff6f61;
            font-size: 0.9rem;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <!-- Session Status -->
        <div class="mb-4">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <!-- Password -->
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <!-- Remember Me -->
            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Remember me</label>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn">Log in</button>
            <!-- Forgot Password -->
            <div class="forgot-password">
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>