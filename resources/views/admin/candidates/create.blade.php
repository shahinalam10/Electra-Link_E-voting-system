<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Candidate - E-Voting System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Hero Section */
        .hero-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #fff;
        }

        .hero-section p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Form Card */
        .form-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        .form-card h2 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #fff;
            text-align: center;
        }

        .form-card .alert {
            margin-bottom: 20px;
        }

        .form-card .form-group {
            margin-bottom: 20px;
        }

        .form-card label {
            font-size: 1rem;
            font-weight: 500;
            color: #fff;
            margin-bottom: 8px;
        }

        .form-card input[type="text"],
        .form-card input[type="file"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .form-card input[type="text"]:focus,
        .form-card input[type="file"]:focus {
            background: rgba(255, 255, 255, 0.3);
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 111, 97, 0.3);
        }

        .form-card .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #ff6f61, #ff4a3d);
            border: none;
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-card .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.4);
        }

        .form-card .btn-secondary {
            background: linear-gradient(135deg, #2a5298, #1e3c72);
            margin-top: 10px;
        }

        .form-card .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(42, 82, 152, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            .form-card {
                padding: 20px;
            }

            .form-card h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero-section">
        <h1>Add New Candidate</h1>
        <p>Fill out the form below to add a new candidate to the election.</p>
    </div>

    <!-- Form Card -->
    <div class="form-card">
        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Add Candidate Form -->
        <form method="POST" action="{{ route('admin.candidates.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Candidate Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="party">Party Name</label>
                <input type="text" name="party" id="party" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="photo">Candidate Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>

            <button type="submit" class="btn">Add Candidate</button>
            <a href="{{ route('admin.candidates.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>