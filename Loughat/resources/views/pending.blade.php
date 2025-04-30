<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Approval</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .card {
            border-radius: 15px;
        }
        .list-group-item {
            border: none;
            padding: 0.75rem 0;
        }
        .btn-danger {
            border-radius: 30px;
        }
        .alert {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="card shadow-lg border-0" style="max-width: 500px;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <div class="d-inline-block rounded-circle p-3 bg-warning bg-opacity-25">
                    <i class="fas fa-clock text-warning fa-3x"></i>
                </div>
            </div>
            <div class="text-center mb-4">
                <h2 class="display-6 fw-bold mb-3">Waiting for Approval</h2>
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <div>
                        Account Status: <strong>Pending Review</strong>
                    </div>
                </div>
            </div>
            <div class="card bg-light border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-user me-2"></i>
                        Hello, {{ auth()->user()->firstname }}!
                    </h5>
                    <p class="card-text text-muted">
                        Your teacher account is currently under review by our administrative team.
                    </p>
                </div>
            </div>
            <div class="card border-0 bg-light mb-4">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-list-ol me-2"></i>
                        Next Steps
                    </h5>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item bg-transparent d-flex align-items-center">
                            <i class="fas fa-check-circle text-primary me-3"></i>
                            <span>Our administrators will review your application</span>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center">
                            <i class="fas fa-envelope text-primary me-3"></i>
                            <span>You'll receive an email when your account is approved</span>
                        </div>
                        <div class="list-group-item bg-transparent d-flex align-items-center">
                            <i class="fas fa-door-open text-primary me-3"></i>
                            <span>Once approved, you can access the teacher dashboard</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-info d-flex align-items-center mb-4" role="alert">
                <i class="fas fa-info-circle me-2"></i>
                <div>
                    Need help? Contact our support team at support@loughat.com
                </div>
            </div>
            <div class="text-center">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg px-4">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
