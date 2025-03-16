<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Electra-Link</title>
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
            padding: 20px;
        }

        .dashboard-container {
            max-width: 1200px;
            width: 100%;
            padding: 20px;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .dashboard-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .dashboard-header p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            max-width: 600px;
            margin: 0 auto;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .dashboard-card h2 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .dashboard-card p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 20px;
        }

        .dashboard-card .btn {
            background: #ff6f61;
            border: none;
            color: #fff;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .dashboard-card .btn:hover {
            background: #ff4a3d;
            transform: translateY(-3px);
        }

        .logout-btn {
            text-align: center;
            margin-top: 40px;
        }

        .logout-btn button {
            background: #ff6f61;
            border: none;
            color: #fff;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .logout-btn button:hover {
            background: #ff4a3d;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1>Welcome, {{ auth()->user()->name }}</h1>
            <p>Your secure and reliable voting platform</p>
        </div>

        <!-- Centered Card -->
        <div class="dashboard-card">
            <h2>Cast Your Vote</h2>
            <p>Participate in the ongoing elections and make your voice heard.</p>
            <a href="{{ route('vote.create') }}" class="btn">Vote Now</a>
        </div>
         <!-- Logout Button -->
         <div class="logout-btn">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>