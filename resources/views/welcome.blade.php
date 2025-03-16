<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Voting System | Electra-Link</title>
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
            color: #333;
        }

        /* Hero Section - Split Layout */
        .hero {
            display: flex;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            overflow: hidden;
        }

        .hero .container {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .hero .text-content {
            flex: 1;
            padding: 20px;
            color: #fff;
            animation: fadeInLeft 1.5s ease-in-out;
        }

        .hero .text-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero .text-content p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .hero .text-content .btn {
            font-size: 1.2rem;
            padding: 12px 40px;
            border: none;
            color: #fff;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-right: 10px;
        }

        .hero .text-content .btn-primary {
            background: #ff6f61;
        }

        .hero .text-content .btn-secondary {
            background: #2a5298;
            border: 2px solid #fff;
        }

        .hero .text-content .btn:hover {
            transform: translateY(-5px);
        }

        .hero .text-content .btn-primary:hover {
            background: #ff4a3d;
        }

        .hero .text-content .btn-secondary:hover {
            background: #1e3c72;
        }

        .hero .interactive-content {
            flex: 1;
            text-align: center;
            animation: fadeInRight 1.5s ease-in-out;
        }

        .hero .interactive-content .stats {
            display: flex;
            justify-content: space-around;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .hero .interactive-content .stat-item {
            text-align: center;
        }

        .hero .interactive-content .stat-item h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ff6f61;
            margin-bottom: 10px;
        }

        .hero .interactive-content .stat-item p {
            font-size: 1rem;
            color: #fff;
        }

        /* Animations */
        @keyframes fadeInLeft {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            0% {
                opacity: 0;
                transform: translateX(50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero .container {
                flex-direction: column;
                text-align: center;
            }

            .hero .text-content h1 {
                font-size: 2.5rem;
            }

            .hero .text-content p {
                font-size: 1.2rem;
            }

            .hero .interactive-content {
                margin-top: 30px;
            }

            .hero .text-content .btn {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <!-- Text Content -->
            <div class="text-content">
                <h1>Welcome to the Electra-Link E-voting System</h1>
                <p>Secure, Reliable, and Transparent Voting Solutions</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
            </div>
            <!-- Interactive Content -->
            <div class="interactive-content">
                <div class="stats">
                    <div class="stat-item">
                        <h2>100%</h2>
                        <p>Secure</p>
                    </div>
                    <div class="stat-item">
                        <h2>24/7</h2>
                        <p>Support</p>
                    </div>
                    <div class="stat-item">
                        <h2>1M+</h2>
                        <p>Votes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>