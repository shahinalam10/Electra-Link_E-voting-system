<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate List - E-Voting System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #fff;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6f61, #ff4a3d);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.4);
        }

        .btn-back {
            background: linear-gradient(135deg, #FF6658, #FF6658);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(42, 82, 152, 0.4);
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }

        .alert-success {
            background: rgba(76, 175, 80, 0.2);
            border: none;
            color: #fff;
        }

        .alert::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            animation: alertTimer 2s linear forwards;
        }

        @keyframes alertTimer {
            0% {
                width: 100%;
            }
            100% {
                width: 0;
            }
        }

        /* Candidate Grid */
        .candidate-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        /* Candidate Card */
        .candidate-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .candidate-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid #ff6f61; /* Add border color on hover */
        }

        .candidate-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .candidate-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #fff;
        }

        .candidate-card p {
            font-size: 1rem;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.8);
        }

        .candidate-card .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .candidate-card .btn {
            flex: 1;
            padding: 8px 12px;
            font-size: 0.9rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .candidate-card .btn-warning {
            background: linear-gradient(135deg, #ffc107, #ff9800);
            border: none;
            color: #fff;
        }

        .candidate-card .btn-danger {
            background: linear-gradient(135deg, #f44336, #d32f2f);
            border: none;
            color: #fff;
        }

        .candidate-card .btn-warning:hover,
        .candidate-card .btn-danger:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .candidate-card .btn-danger:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(244, 67, 54, 0.4); /* Red shadow on hover */
        }

        /* Edit Button */
        .candidate-card .btn-warning {
            background: linear-gradient(135deg, #012863a8, #012863a8); /* Green gradient for edit */
            border: none;
            color: #fff;
        }

        .candidate-card .btn-warning:hover {
            transform: translateY(-3px);
        }

        /* Delete Button */
        .candidate-card .btn-danger {
            background: linear-gradient(135deg, #f44336, #e57373); /* Red gradient for delete */
            border: none;
            color: #fff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .candidate-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Candidate List</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-back mb-3">Back</a>
        <a href="{{ route('admin.candidates.create') }}" class="btn btn-primary mb-3">Add New Candidate</a>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Candidate Grid -->
        <div class="candidate-grid">
            @foreach($candidates as $candidate)
            <div class="candidate-card">
                <!-- Candidate Photo -->
                {{-- @if($candidate->photo)
                <img src="{{ asset('storage/' . $candidate->photo) }}" alt="Candidate Photo">
                @else
                <div class="no-photo">No Photo Available</div>
                @endif --}}

                <!-- Candidate Details -->
                <h3>{{ $candidate->name }}</h3>
                <p><strong>Party Name:</strong> {{ $candidate->party }}</p>
                <p><strong>Votes:</strong> {{ $candidate->votes }}</p>

                <!-- Action Buttons -->
                <div class="btn-group">
                    <a href="{{ route('admin.candidates.edit', $candidate->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.candidates.delete', $candidate->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this candidate?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Automatically hide alerts after 2 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => alert.style.display = 'none');
        }, 2000);
    </script>
</body>
</html>