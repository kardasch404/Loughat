<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pending Approval | Loughat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .main-card {
            max-width: 700px;
            margin: 2rem auto;
            border-radius: 1.5rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .status-badge {
            background-color: #fff3cd;
            color: #856404;
            border-radius: 50rem;
        }

        .progress {
            height: 0.5rem;
        }

        .step-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
        }

        .support-section {
            background: linear-gradient(45deg, #4481eb, #04befe);
            border-radius: 1rem;
        }

        .logout-btn {
            background: linear-gradient(45deg, #ff6b6b, #ff8787);
            border: none;
            transition: transform 0.2s;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            background: linear-gradient(45deg, #ff8787, #ff6b6b);
        }
    </style>
</head>
<body class="py-5">
    <div class="container">
        <div class="main-card shadow-lg p-4 p-md-5">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <div class="bg-warning bg-opacity-10 d-inline-block p-4 rounded-circle mb-4">
                    <i class="fas fa-clock text-warning fa-3x"></i>
                </div>
                <h1 class="h2 fw-bold mb-3">Waiting for Approval</h1>
                <span class="status-badge px-4 py-2 d-inline-flex align-items-center gap-2">
                    <i class="fas fa-hourglass-half"></i>
                    Pending Review
                </span>
            </div>

            <!-- Progress Section -->
            <div class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted">Application Progress</span>
                    <span class="badge bg-primary">33%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="card border-0 bg-light mb-4">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-user-circle text-primary fa-2x me-3"></i>
                        <h2 class="h5 mb-0">Welcome, {{ auth()->user()->firstname }}!</h2>
                    </div>
                    <p class="text-muted mb-0">Thank you for applying to be a teacher. Our team is currently reviewing your application.</p>
                </div>
            </div>

            <!-- Steps Section -->
            <div class="card border-0 bg-light mb-4">
                <div class="card-body p-4">
                    <h3 class="h5 mb-4">Application Steps</h3>
                    <div class="d-flex flex-column gap-4">
                        <div class="d-flex align-items-center">
                            <div class="step-icon bg-success d-flex align-items-center justify-content-center me-3">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <span>Application Submitted</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="step-icon bg-primary d-flex align-items-center justify-content-center me-3">
                                <i class="fas fa-sync-alt text-white"></i>
                            </div>
                            <span>Administrative Review</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="step-icon bg-secondary d-flex align-items-center justify-content-center me-3">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <span>Account Activation</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support Section -->
            <div class="support-section text-white p-4 mb-4">
                <h3 class="h5 mb-3">
                    <i class="fas fa-headset me-2"></i>
                    Need Support?
                </h3>
                <p class="mb-3">Our support team is here to help you 24/7</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="mailto:support@loughat.com" class="btn btn-light btn-sm">
                        <i class="fas fa-envelope me-2"></i>Email Support
                    </a>
                    <a href="#" class="btn btn-light btn-sm">
                        <i class="fas fa-comments me-2"></i>Live Chat
                    </a>
                </div>
            </div>

            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="text-center">
                @csrf
                <button type="submit" class="btn logout-btn btn-lg text-white px-5 py-3">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Logout
                </button>
            </form>
        </div>
    </div>
</body>
</html>
