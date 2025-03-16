<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Voter IDs-Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f4f8; /* Light background for contrast */
            min-height: 100vh;
        }
        .navbar {
            background: #005bb5; /* Navbar background color */
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .navbar a:hover {
            color: #cce7ff; /* Light blue hover effect */
        }
        .container-custom {
            max-width: 1200px;
            margin: auto;
            padding: 40px;
            background: #ffffff; /* White background for the container */
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .btn-primary {
            background: #005bb5; /* Matching navbar color */
            border: none;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
            background: #004494; /* Darker shade for hover */
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #f0f7ff; /* Very light tint of navbar color for cards */
            border: 1px solid #e0e0e0; /* Subtle border for cards */
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .card h2, .card h4 {
            color: #005bb5; /* Matching navbar color for headings */
            font-weight: 600;
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #005bb5;
            box-shadow: 0 0 5px rgba(0, 91, 181, 0.3);
        }
        .alert {
            border-radius: 8px;
            font-size: 14px;
        }
        .pagination .page-item .page-link {
            border-radius: 8px;
            margin: 0 2px;
            transition: background 0.3s ease, color 0.3s ease;
        }
        .pagination .page-item.active .page-link {
            background: #005bb5;
            border-color: #005bb5;
        }
        .pagination .page-item .page-link:hover {
            background: #004494;
            color: #fff;
        }
        .btn-danger {
            transition: background 0.3s ease;
        }
        .btn-danger:hover {
            background: #dc3545;
        }
        .text-muted {
            color: #6c757d !important; /* Muted text color */
        }
        .table thead th {
            background: #005bb5; /* Matching navbar color for table header */
            color: #fff; /* White text for table header */
            font-weight: 500;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa; /* Light hover effect for table rows */
        }
        .table tbody td {
            color: #495057; /* Dark text for table content */
            font-size: 14px;
        }
        .table tbody td .btn-sm {
            font-size: 12px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
        </div>
    </nav>

    <div class="container-custom">
        <div class="row">
            <!-- Add Voter IDs Section -->
            <div class="col-md-5">
                <div class="card mb-4">
                    <h2 class="text-center mb-4">Add Voter IDs</h2>
                    @if(session('error'))
                        <div class="alert alert-danger" id="error-alert">
                            @if(is_array(session('error')))
                                @foreach(session('error') as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            @else
                                <p>{{ session('error') }}</p>
                            @endif
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" id="success-alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.voter_ids.store') }}" class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <label for="voter_ids" class="form-label">Enter Voter IDs (comma separated)</label>
                            <textarea name="voter_ids" class="form-control" rows="7" required></textarea>
                            <small class="text-muted">Example: 12345, 67890, 112233, 445566</small>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Add Voter IDs</button>
                    </form>
                </div>
            </div>
    
            <!-- Search and Existing Voter IDs Section -->
            <div class="col-md-7">
                <div class="card">
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('admin.voter_ids.search') }}" class="mb-4">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search Voter ID" required>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
    
                    <!-- Search Result -->
                    @if(session('search_result'))
                        <div class="alert alert-info" id="search-result-alert">
                            <p>{{ session('search_result') }}</p>
                        </div>
                    @endif
    
                    <!-- Existing Voter IDs Table -->
                    <h4 class="text-center mb-4">Existing Voter IDs</h4>
                    <!-- Bulk Delete Form -->
                    <form method="POST" action="{{ route('admin.voter_ids.bulkDelete') }}" id="bulk-delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mb-3" id="delete-selected-btn" disabled>
                            <i class="fas fa-trash-alt"></i> Delete Selected
                        </button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="select-all">
                                        </th>
                                        <th>ID</th>
                                        <th>Voter ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    // Calculate the starting serial number for the current page
                                    $i = ($voter_ids->currentPage() - 1) * $voter_ids->perPage() + 1;
                                    @endphp
                                    @foreach($voter_ids as $voter)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="selected_ids[]" value="{{ $voter->id }}">
                                            </td>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $voter->voter_id }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.voter_ids.destroy', $voter->id) }}" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $voter_ids->onEachSide(1)->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Automatically hide alerts after 2 seconds
        $(document).ready(function() {
            setTimeout(function() {
                $("#error-alert").fadeOut("slow");
                $("#success-alert").fadeOut("slow");
                $("#search-result-alert").fadeOut("slow");
            }, 2000); // 2 seconds

            // Select All Checkbox
            $('#select-all').click(function() {
                $('input[name="selected_ids[]"]').prop('checked', this.checked);
                toggleDeleteButton();
            });

            // Toggle Delete Button Based on Selected Checkboxes
            $('input[name="selected_ids[]"]').change(function() {
                toggleDeleteButton();
            });

            function toggleDeleteButton() {
                if ($('input[name="selected_ids[]"]:checked').length > 0) {
                    $('#delete-selected-btn').prop('disabled', false);
                } else {
                    $('#delete-selected-btn').prop('disabled', true);
                }
            }

            // Confirm Bulk Deletion
            $('#bulk-delete-form').submit(function() {
                return confirm('Are you sure you want to delete the selected voter IDs?');
            });

            // Handle Individual Delete Form Submission
            $('.delete-form').submit(function(e) {
                if (!confirm('Are you sure you want to delete this voter ID?')) {
                    e.preventDefault(); // Prevent form submission if not confirmed
                }
            });
        });
    </script>
</body>
</html>