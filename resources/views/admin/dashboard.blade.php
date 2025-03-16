<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Electra-Link</title>
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
            padding: 20px;
            position: relative;
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Admin Header */
        .admin-header {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: center;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .admin-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #fff;
        }

        .admin-header p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Buttons */
        .admin-container .btn {
            background: linear-gradient(135deg, #ff6f61, #ff4a3d);
            border: none;
            color: #fff;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-right: 10px;
        }

        .admin-container .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.4);
        }

        /* Cards */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid transparent;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            transform: rotate(45deg);
            transition: all 0.5s ease;
            z-index: 1;
        }

        .card:hover::before {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .card h4 {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 10px;
            color: #fff;
        }

        .card h4 span {
            font-size: 0.9rem;
            color: #ff6f61;
            display: block;
            margin-top: 5px;
        }

        .card p {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ff6f61;
            margin: 0;
        }
        .card p.percentage {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 5px;
        }
        /* Different Border Colors for Cards */
        .card:nth-child(1) {
            border-color: #ff6f61;
        }

        .card:nth-child(2) {
            border-color: #1ef729be;
        }

        .card:nth-child(3) {
            border-color: #88b04b;
        }

        .card:nth-child(4) {
            border-color: #ffa500;
        }

        .card:nth-child(5) {
            border-color: #92a8d1;
        }

        .card:nth-child(6) {
            border-color: #955251;
        }
        .card:nth-child(7) {
            border-color: #f9c74f;
        }
        .card:nth-child(8) {
            border-color: #f3722c;
        }

        /* Custom Border Color for Total Voters Card */
        .card-total-voters {
            border-color: #6b5b95; /* You can change this color */
        }

        /* Vote Count Animation */
        @keyframes voteUpdate {
            0% {
                transform: scale(1);
                color: #fff;
            }
            50% {
                transform: scale(1.2);
                color: #ffeb3b;
            }
            100% {
                transform: scale(1);
                color: #fff;
            }
        }

        .vote-update {
            animation: voteUpdate 0.5s ease;
        }

        /* Logout Button */
        .logout-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
        }

        .logout-btn button {
            background: linear-gradient(135deg, #ff6f61, #ff4a3d);
            border: none;
            color: #fff;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .logout-btn button:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Admin Header -->
        <div class="admin-header">
            <h1>Admin Dashboard</h1>
            <p>Welcome back, '{{ auth()->user()->name }}'. Manage the E-Voting System efficiently.</p>
        </div>

       <!-- Action Buttons -->
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.candidates.index') }}" class="btn btn-primary">Manage Candidates</a>
            <a href="{{ route('admin.voter_ids.index') }}" class="btn btn-primary">Manage Voter IDs</a>
        </div>


        <!-- Total Votes and Candidate Votes -->
        <h1 class="mt-5">Vote Statistics</h1>
        <div class="card-grid">
            <!-- Total Votes Card -->
            <div class="card">
                <h4>Total Votes</h4>
                <p id="totalVotes">0</p>
            </div>
        
            <!-- Total Voters Card -->
            <div class="card card-total-voters">
                <h4>Total Voters</h4>
                <p id="totalVoters">{{ $totalVoters }}</p>
            </div>
        
            <!-- Total Votes Percentage Card -->
            <div class="card">
                <h4>Vote Percentage</h4>
                <p id="totalVotesPercentage">{{ $totalVotesPercentage }}% of Total Voters</p>
            </div>
        </div>

        <h1 class="mt-5">Candidate wise Vote Statistics</h1>
        <div class="card-grid">
            <!-- Votes per Candidate -->
            @foreach($candidates as $candidate)
            <div class="card">
                <h4>{{ $candidate->name }} <span>({{ $candidate->party }})</span></h4>
                <p id="admin-votes-{{ $candidate->id }}">{{ $candidate->votes }}</p>
                <p class="percentage" id="admin-percentage-{{ $candidate->id }}">{{ $candidate->vote_percentage }}% of total votes</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Logout Button -->
    <div class="logout-btn">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
function fetchVotes() {
    $.ajax({
        url: "{{ route('admin.getVotes') }}",
        method: "GET",
        success: function(response) {
            console.log("AJAX Response:", response); // Debugging line
            console.log("Total Votes:", response.totalVotes); // Debugging line
            console.log("Total Voters:", response.totalVoters); // Debugging line
            let totalVotes = 0;

            // Update candidate votes and percentages
            response.candidates.forEach(candidate => {
                const voteCell = $("#admin-votes-" + candidate.id);
                const percentageCell = $("#admin-percentage-" + candidate.id);

                if (voteCell.length && percentageCell.length) { // Check if elements exist
                    if (voteCell.text() !== candidate.votes.toString()) {
                        voteCell.text(candidate.votes).addClass("vote-update");
                        setTimeout(() => voteCell.removeClass("vote-update"), 500);
                    }
                    totalVotes += candidate.votes;

                    // Update percentage
                    const percentage = response.totalVotes > 0 ? ((candidate.votes / response.totalVotes) * 100).toFixed(2) : 0;
                    percentageCell.text(percentage + "% of total votes");
                } else {
                    console.error("Element not found for candidate ID:", candidate.id);
                }
            });

            // Update total votes and total voters
            $("#totalVotes").text(totalVotes);
            $("#totalVoters").text(response.totalVoters);

            // Calculate and update total votes percentage
            const totalVotesPercentage = response.totalVoters > 0 ? ((totalVotes / response.totalVoters) * 100).toFixed(2) : 0;
            console.log("Total Votes Percentage:", totalVotesPercentage); // Debugging line
            $("#totalVotesPercentage").text(totalVotesPercentage + "% of Total Voters");
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error: ", status, error);
        }
    });
}

// Refresh votes every 5 seconds
setInterval(fetchVotes, 5000);

// Initial fetch
fetchVotes();
    </script>
</body>
</html>