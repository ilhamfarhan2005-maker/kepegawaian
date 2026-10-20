<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Kepegawaian</title>
    <!-- Google Fonts & Bootstrap Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --bg-canvas: #f1f5f9;
            --surface-card: #ffffff;
            --primary-accent: #3b82f6;
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-canvas);
            color: #1e293b;
            min-height: 100vh;
        }

        /* 3D Glass Navbar */
        .navbar-3d {
            background: rgba(15, 23, 42, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.25), 0 8px 10px -6px rgba(0, 0, 0, 0.2);
        }

        /* 3D Card Architecture */
        .card-3d {
            background: var(--surface-card);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 18px;
            box-shadow: 0 12px 24px -4px rgba(15, 23, 42, 0.08), 0 4px 8px -2px rgba(15, 23, 42, 0.04);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .card-3d:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 30px -4px rgba(15, 23, 42, 0.12), 0 8px 12px -3px rgba(15, 23, 42, 0.06);
        }

        /* 3D Elevated Buttons */
        .btn-3d-primary {
            background: var(--primary-gradient);
            color: #ffffff;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 16px -2px rgba(59, 130, 246, 0.45);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-3d-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -2px rgba(59, 130, 246, 0.6);
            color: #ffffff;
        }
        .btn-3d-primary:active {
            transform: translateY(1px);
        }

        /* Modern Table */
        .table-modern thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1rem 1.25rem;
            border-bottom: 2px solid #e2e8f0;
        }
        .table-modern tbody td {
            padding: 1.1rem 1.25rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        /* 3D Pill Badge */
        .badge-dept {
            background: #e0f2fe;
            color: #0369a1;
            font-weight: 600;
            padding: 0.45rem 0.85rem;
            border-radius: 50rem;
            border: 1px solid #bae6fd;
            box-shadow: 0 2px 4px rgba(3, 105, 161, 0.08);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-3d sticky-top mb-4 py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-extrabold" href="{{ route('employees.index') }}">
                <span class="d-inline-flex align-items-center justify-content-center bg-primary rounded-3 text-white shadow-sm" style="width: 36px; height: 36px;">
                    <i class="bi bi-layers-fill"></i>
                </span>
                <span style="letter-spacing: -0.5px;">SI KEPEGAWAIAN</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto ms-lg-4 gap-2">
                    <li class="nav-item">
                        <a class="nav-link px-3 rounded-3 {{ request()->routeIs('employees.*') ? 'active bg-white bg-opacity-10 fw-bold' : '' }}" href="{{ route('employees.index') }}">
                            <i class="bi bi-people me-1"></i> Data Pegawai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 rounded-3 {{ request()->routeIs('departments.*') ? 'active bg-white bg-opacity-10 fw-bold' : '' }}" href="{{ route('departments.index') }}">
                            <i class="bi bi-diagram-3 me-1"></i> Departemen
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center gap-2 text-white-50">
                        <div class="rounded-circle bg-white bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                            <i class="bi bi-person text-white"></i>
                        </div>
                        <span class="small fw-semibold text-white">{{ Auth::user()->name }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm rounded-pill px-3 py-1">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mb-5">
        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center gap-2 alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger border-0 shadow-sm rounded-4 d-flex align-items-center gap-2 alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>