<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Kepegawaian</title>
    <!-- Google Fonts & Bootstrap 5 + Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --sidebar-width: 270px;
            --bg-canvas: #f8fafc;
            --surface-card: #ffffff;
            --primary-accent: #3b82f6;
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-canvas);
            color: #1e293b;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* 3D Sidebar Styling */
        .sidebar-wrapper {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: #0f172a;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-right: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 4px 0 24px -2px rgba(15, 23, 42, 0.25);
        }

        .sidebar-brand {
            padding: 1.5rem 1.4rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sidebar-menu {
            padding: 1.25rem 0.9rem;
            list-style: none;
            margin: 0;
        }

        .sidebar-menu .menu-header {
            font-size: 0.72rem;
            text-transform: uppercase;
            font-weight: 700;
            color: #64748b;
            padding: 0.75rem 0.75rem 0.35rem;
            letter-spacing: 0.06em;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.75rem 0.9rem;
            color: #94a3b8;
            text-decoration: none;
            font-weight: 500;
            border-radius: 12px;
            margin-bottom: 0.35rem;
            transition: all 0.2s ease;
        }

        .sidebar-link i {
            font-size: 1.15rem;
            transition: transform 0.2s ease;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(3px);
        }

        .sidebar-link.active {
            color: #ffffff;
            background: var(--primary-gradient);
            box-shadow: 0 6px 16px -2px rgba(59, 130, 246, 0.5);
            font-weight: 600;
        }

        .sidebar-user {
            padding: 1.25rem 1.4rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.15);
        }

        /* Main Content Layout */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .top-navbar {
            height: 72px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid #e2e8f0;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .content-body {
            padding: 2rem;
            flex-grow: 1;
        }

        /* 3D Card Styling */
        .card-3d {
            background: var(--surface-card);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 18px;
            box-shadow: 0 10px 25px -4px rgba(15, 23, 42, 0.05), 0 4px 6px -2px rgba(15, 23, 42, 0.02);
        }

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

        /* Badge Dept */
        .badge-dept {
            background: #e0f2fe;
            color: #0369a1;
            font-weight: 600;
            padding: 0.45rem 0.85rem;
            border-radius: 50rem;
            border: 1px solid #bae6fd;
        }

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
    </style>
</head>
<body>

    <!-- SIDEBAR KIRI -->
    <aside class="sidebar-wrapper">
        <div>
            <!-- Brand -->
            <div class="sidebar-brand d-flex align-items-center gap-2">
                <span class="d-inline-flex align-items-center justify-content-center bg-primary rounded-3 text-white shadow-sm" style="width: 36px; height: 36px;">
                    <i class="bi bi-layers-fill"></i>
                </span>
                <div>
                    <h6 class="text-white fw-bold mb-0" style="letter-spacing: -0.3px;">HRIS SYSTEM</h6>
                    <small class="text-white-50" style="font-size: 0.7rem;">Kepegawaian Portal</small>
                </div>
            </div>

            <!-- Navigation Links -->
            <ul class="sidebar-menu">
                <li class="menu-header">Master Data</li>
                <li>
                    <a class="sidebar-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" href="{{ route('employees.index') }}">
                        <i class="bi bi-people-fill"></i>
                        <span>Data Pegawai</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-link {{ request()->routeIs('departments.*') ? 'active' : '' }}" href="{{ route('departments.index') }}">
                        <i class="bi bi-diagram-3-fill"></i>
                        <span>Data Departemen</span>
                    </a>
                </li>

                <li class="menu-header">Menu Mendatang</li>
                <li>
                    <a class="sidebar-link text-white-50" href="#" style="opacity: 0.5; pointer-events: none;">
                        <i class="bi bi-calendar-check"></i>
                        <span>Presensi (Segera)</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-link text-white-50" href="#" style="opacity: 0.5; pointer-events: none;">
                        <i class="bi bi-wallet2"></i>
                        <span>Penggajian (Segera)</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- User Info Bottom -->
        <div class="sidebar-user d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle bg-primary bg-opacity-25 border border-primary border-opacity-50 text-primary d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div style="line-height: 1.2;">
                    <div class="text-white small fw-bold">{{ Auth::user()->name }}</div>
                    <div class="text-white-50" style="font-size: 0.72rem;">Administrator</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" title="Logout">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        </div>
    </aside>

    <!-- AREA KONTEN KANAN -->
    <div class="main-content">
        <!-- Topbar Sederhana -->
        <header class="top-navbar">
            <div class="fw-semibold text-secondary small">
                <i class="bi bi-calendar-event me-1"></i> {{ date('l, d F Y') }}
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill small">
                    <i class="bi bi-shield-check me-1"></i> Admin Session Active
                </span>
            </div>
        </header>

        <!-- Body Utama -->
        <div class="content-body">
            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center gap-2 alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger border-0 shadow-sm rounded-4 d-flex align-items-center gap-2 alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>