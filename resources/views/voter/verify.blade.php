<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter ID Verification - Electra-Link </title>
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

        .verification-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
        }

        .verification-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }

        .verification-container .alert {
            margin-bottom: 20px;
        }

        .verification-container .form-group {
            margin-bottom: 20px;
        }

        .verification-container label {
            font-weight: 500;
            color: #fff;
        }

        .verification-container input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .verification-container input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 3px rgba(255, 111, 97, 0.3);
        }

        .verification-container .btn {
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

        .verification-container .btn:hover {
            background: #ff4a3d;
            transform: translateY(-3px);
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
    <div class="verification-container">
        <h1>Voter ID Verification</h1>

        <!-- Error Message -->
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Verification Form -->
        <form action="{{ route('voter.verify') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="voter_id">Enter Your Voter ID:</label>
                <input type="text" name="voter_id" id="voter_id" class="form-control" required>
            </div>

            <button type="submit" class="btn">Verify</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>