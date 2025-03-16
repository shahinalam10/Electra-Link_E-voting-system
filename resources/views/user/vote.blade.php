<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote for Your Candidate - Electra-Link</title>
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
            position: relative;
            overflow-x: hidden;
        }

        .vote-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        .vote-container h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            color: #fff;
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .vote-container .alert {
            margin-bottom: 20px;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
        }

        /* Candidate Grid */
        .candidate-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        /* Candidate Card */
        .candidate-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.1));
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: slideIn 0.5s ease-in-out;
        }

        .candidate-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.15));
        }

        .candidate-card.voted {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.3), rgba(56, 142, 60, 0.3));
            pointer-events: none;
        }

        .candidate-card h3 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #fff;
        }

        .candidate-card p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            color: rgba(255, 255, 255, 0.8);
        }

        .candidate-card input[type="radio"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        /* Submit Button */
        .vote-container .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            color: #fff;
            font-weight: 600;
            font-size: 1.2rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            margin-top: 30px;
            box-shadow: 0 4px 15px rgba(106, 17, 203, 0.3);
        }

        .vote-container .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(106, 17, 203, 0.5);
        }

        .vote-container .btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            box-shadow: none;
        }

        /* Voted Section */
        .vote-container .voted-section {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.3), rgba(56, 142, 60, 0.3));
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            text-align: center;
            padding: 25px;
            border-radius: 15px;
            margin-top: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        .vote-container .voted-section strong {
            color: #ffeb3b; /* Yellow color for emphasis */
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
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.3);
        }

        .logout-btn button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 111, 97, 0.5);
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

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(-20px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="vote-container">
        <h1>Vote for Your Candidate</h1>

        <!-- Error Message -->
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Vote Message -->
        <div id="voteMessage" class="alert d-none"></div>

        <!-- Vote Form -->
        <form id="voteForm" @if($userVote) style="pointer-events: none; opacity: 0.7;" @endif>
            @csrf
            <div class="candidate-grid">
                @foreach($candidates as $candidate)
                <div class="candidate-card @if($userVote && $userVote->candidate_id == $candidate->id) voted @endif">
                    <h3>{{ $candidate->name }}</h3>
                    <p>{{ $candidate->party }}</p>
                    <label>
                        <input type="radio" name="candidate_id" value="{{ $candidate->id }}"
                            @if($userVote && $userVote->candidate_id == $candidate->id) checked disabled @endif required>
                        Select Candidate
                    </label>
                </div>
                @endforeach
            </div>

            @if(!$userVote)
            <button type="submit" class="btn">Submit Vote</button>
            @else
            <div class="voted-section">
                ✅ You have voted for <strong>{{ $userVote->candidate->name }}</strong> ({{ $userVote->candidate->party }})
            </div>
            @endif
        </form>
    </div>

    <!-- Logout Button -->
    <div class="logout-btn">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#voteForm").submit(function(event){
                event.preventDefault();
                let candidateId = $("input[name='candidate_id']:checked").val();

                if (!candidateId) {
                    alert("Please select a candidate.");
                    return;
                }

                $.ajax({
                    url: "{{ route('vote.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        candidate_id: candidateId
                    },
                    success: function(response) {
                        $("#voteMessage")
                            .removeClass("d-none alert-danger")
                            .addClass("alert-success")
                            .text("You have successfully voted!")
                            .fadeIn();

                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function(xhr) {
                        let errorMsg = xhr.responseJSON ? xhr.responseJSON.message : "Error occurred!";
                        
                        $("#voteMessage")
                            .removeClass("d-none alert-success")
                            .addClass("alert-danger")
                            .text(errorMsg)
                            .fadeIn();
                    }
                });
            });
        });
    </script>
</body>
</html>