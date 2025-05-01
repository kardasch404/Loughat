<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pending Approval | Loughat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .card {
            border-radius: 20px;
            border: none;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .status-icon {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .list-group-item {
            border: none;
            padding: 1rem 0;
            transition: transform 0.2s ease;
        }

        .list-group-item:hover {
            transform: translateX(10px);
            background: transparent;
        }

        .btn-danger {
            border-radius: 30px;
            padding: 12px 35px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #ff6b6b, #ff8787);
            border: none;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
            background: linear-gradient(45deg, #ff8787, #ff6b6b);
        }

        .alert {
            border-radius: 15px;
            border: none;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .progress-container {
            margin: 2rem 0;
        }

        .progress {
            height: 8px;
            border-radius: 4px;
            background-color: #e9ecef;
            margin-top: 1rem;
        }

        .progress-bar {
            background: linear-gradient(45deg, #4481eb, #04befe);
            animation: progress 2s ease-in-out;
        }

        @keyframes progress {
            from { width: 0; }
            to { width: 33%; }
        }

        .status-badge {
            padding: 8px 15px;
            border-radius: 20px;
            background-color: #fff3cd;
            color: #856404;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .support-card {
            background: linear-gradient(45deg, #4481eb, #04befe);
            color: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .support-card a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .step-number {
            width: 25px;
            height: 25px;
            background-color: #4481eb;
            color: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            margin-right: 1rem;
        }
    </style>
</head>
<body>

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="card shadow-lg" style="max-width: 600px;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <div class="d-inline-block rounded-circle p-3 bg-warning bg-opacity-25">
                    <i class="fas fa-clock text-warning fa-3x status-icon"></i>
                </div>
            </div>

            <div class="text-center mb-4">
                <h2 class="display-6 fw-bold mb-3">Waiting for Approval</h2>
                <span class="status-badge">
                    <i class="fas fa-hourglass-half"></i>
                    Pending Review
                </span>
            </div>

            <div class="progress-container">
                <div class="d-flex justify-content-between mb-2">
                    <small class="text-muted">Application Progress</small>
                    <small class="text-muted">33%</small>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <div class="card bg-light border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title d-flex align-items-center">
                        <i class="fas fa-user-circle text-primary me-2"></i>
                        Welcome, {{ auth()->user()->firstname }}!
                    </h5>
                    <p class="card-text text-muted">
                        Thank you for applying to be a teacher. Our team is currently reviewing your application to ensure the highest quality standards for our platform.
                    </p>
                </div>
            </div>

            <div class="card border-0 bg-light mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">
                        <i class="fas fa-list-ol text-primary me-2"></i>
                        Application Process
                    </h5>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item bg-transparent d-flex align-items-center">
                            <span class="step-number">1</span>
                            <span>Application Submitted <i class="fas fa-check-circle text-success ms-2"></i></span>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center">
                            <span class="step-number">2</span>
                            <span>Administrative Review <i class="fas fa-spinner fa-spin text-primary ms-2"></i></span>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center">
                            <span class="step-number">3</span>
                            <span>Account Activation <i class="fas fa-clock text-muted ms-2"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="support-card mb-4">
                <h5 class="mb-3"><i class="fas fa-headset me-2"></i> Need Support?</h5>
                <p class="mb-2">Our support team is here to help you 24/7</p>
                <div class="d-flex gap-3">
                    <a href="mailto:support@loughat.com"><i class="fas fa-envelope me-1"></i> Email Support</a>
                    <a href="#"><i class="fas fa-comments me-1"></i> Live Chat</a>
                </div>
            </div>

            <div class="text-center">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Add smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Add hover effect to list items
    const listItems = document.querySelectorAll('.list-group-item');
    listItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            item.style.transform = 'translateX(10px)';
        });
        item.addEventListener('mouseleave', () => {
            item.style.transform = 'translateX(0)';
        });
    });
</script>
</body>
</html>
