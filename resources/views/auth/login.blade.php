<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SI Kepegawaian</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card-3d {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.45);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .form-control-modern {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            background-color: #f8fafc;
            transition: all 0.2s;
        }
        .form-control-modern:focus {
            background-color: #ffffff;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }
        .btn-login-3d {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
            border: none;
            border-radius: 12px;
            font-weight: 700;
            padding: 0.85rem;
            box-shadow: 0 8px 20px -4px rgba(59, 130, 246, 0.5);
            transition: all 0.25s ease;
        }
        .btn-login-3d:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px -4px rgba(59, 130, 246, 0.65);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="login-card-3d p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-4 text-white shadow-lg mb-3" style="width: 52px; height: 52px;">
                            <i class="bi bi-shield-lock-fill fs-4"></i>
                        </div>
                        <h4 class="fw-extrabold text-dark mb-1">Selamat Datang</h4>
                        <p class="text-muted small">Masuk untuk mengelola data kepegawaian</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 px-3 rounded-3 small border-0 mb-4">
                            <i class="bi bi-exclamation-circle me-1"></i> {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary">Email Administrator</label>
                            <input type="email" name="email" class="form-control form-control-modern" value="{{ old('email') }}" placeholder="admin@kepegawaian.com" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-semibold text-secondary">Kata Sandi</label>
                            <input type="password" name="password" class="form-control form-control-modern" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-login-3d w-100 text-white">
                            Masuk ke Sistem <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>