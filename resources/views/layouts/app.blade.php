
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard') | SIM-SARPRAS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --green: #294b3b;
            --green-light: #e0e9df;
            --cream: #f4f2eb;
            --glass: rgba(255, 255, 255, 0.76);
            --text: #25382f;
            --muted: #718075;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--text);
            background: linear-gradient(135deg, #e7e8dc, #d6ddd3, #f4eee2);
            font-family: "Segoe UI", sans-serif;
        }

        .app-shell {
            display: flex;
            min-height: 100vh;
            gap: 22px;
            padding: 22px;
        }

        .sidebar {
            width: 255px;
            flex-shrink: 0;
            padding: 25px 16px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 25px;
            background: var(--glass);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow: 0 12px 35px rgba(35, 55, 40, 0.08);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 5px 10px 30px;
            color: var(--green);
            font-size: 19px;
            font-weight: 800;
            white-space: nowrap;
        }

        .brand i {
            font-size: 25px;
        }

        .menu-heading {
            display: block;
            margin-bottom: 12px;
            padding-left: 12px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 13px;
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 7px;
            border: 0;
            border-radius: 13px;
            background: transparent;
            color: #56665c;
            text-align: left;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .menu-link i {
            min-width: 20px;
            font-size: 18px;
            text-align: center;
        }

        .menu-link:hover,
        .menu-link.active {
            background: var(--green);
            color: #fff;
        }

        .sidebar-divider {
            margin: 20px 8px;
            border-color: rgba(41, 75, 59, 0.15);
        }

        .main-content {
            min-width: 0;
            flex: 1;
        }

        .topbar,
        .glass-card {
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 22px;
            background: var(--glass);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow: 0 10px 30px rgba(35, 55, 40, 0.06);
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 18px 24px;
            margin-bottom: 22px;
        }

        .topbar-title {
            color: var(--green);
            font-size: 17px;
        }

        .user-role {
            color: var(--muted);
            font-size: 12px;
            text-transform: capitalize;
        }

        .page-content {
            min-width: 0;
        }

        .glass-card {
            padding: 24px;
        }

        .stat-card {
            height: 100%;
            padding: 22px;
        }

        .stat-icon {
            display: grid;
            width: 45px;
            height: 45px;
            place-items: center;
            border-radius: 14px;
            background: var(--green-light);
            color: var(--green);
            font-size: 21px;
        }

        .btn-sarpras {
            border: 1px solid var(--green);
            border-radius: 10px;
            background: var(--green);
            color: #fff;
        }

        .btn-sarpras:hover {
            border-color: #1d382b;
            background: #1d382b;
            color: #fff;
        }

        .table-responsive {
            border-radius: 12px;
        }

        .table {
            --bs-table-bg: transparent;
            vertical-align: middle;
        }

        .table thead th {
            color: var(--green);
            font-size: 13px;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .app-shell {
                gap: 10px;
                padding: 10px;
            }

            .sidebar {
                width: 68px;
                padding: 18px 7px;
            }

            .brand {
                justify-content: center;
                margin: 5px 0 25px;
                font-size: 0;
            }

            .brand i {
                font-size: 23px;
            }

            .menu-heading,
            .menu-link span {
                display: none;
            }

            .menu-link {
                justify-content: center;
                gap: 0;
                padding: 13px 5px;
            }

            .menu-link i {
                font-size: 20px;
            }

            .sidebar-divider {
                margin: 15px 3px;
            }

            .topbar {
                align-items: flex-start;
                padding: 15px;
            }

            .topbar-title {
                font-size: 14px;
            }

            .page-content .glass-card {
                padding: 16px;
            }
        }

        @media (max-width: 480px) {
            .app-shell {
                gap: 8px;
                padding: 8px;
            }

            .sidebar {
                width: 54px;
                padding: 15px 4px;
                border-radius: 17px;
            }

            .topbar {
                gap: 8px;
                padding: 12px;
                border-radius: 16px;
            }

            .topbar .text-secondary {
                font-size: 10px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
<div class="app-shell">

    <aside class="sidebar">
        <div class="brand">
            <i class="bi bi-buildings"></i>
            <span>SIM-SARPRAS</span>
        </div>

        <small class="menu-heading">MENU UTAMA</small>

        <a href="{{ route('dashboard') }}"
           class="menu-link {{ request()->routeIs('dashboard', 'dashboard.admin', 'dashboard.petugas', 'dashboard.guru', 'dashboard.murid') ? 'active' : '' }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>

        @if(in_array(auth()->user()->role, ['admin', 'petugas_sarpras']))
            <a href="{{ route('sarana.index') }}"
               class="menu-link {{ request()->routeIs('sarana.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i>
                <span>Data Sarana</span>
            </a>

            <a href="{{ route('kategori.index') }}"
               class="menu-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i>
                <span>Kategori Sarana</span>
            </a>

            <a href="{{ route('ruangan.index') }}"
               class="menu-link {{ request()->routeIs('ruangan.*') ? 'active' : '' }}">
                <i class="bi bi-door-open"></i>
                <span>Data Ruangan</span>
            </a>
        @endif

        @if(in_array(auth()->user()->role, ['admin', 'petugas_sarpras', 'murid']))
            <a href="{{ route('laporan.index') }}"
               class="menu-link {{ request()->routeIs('laporan.index', 'laporan.status') ? 'active' : '' }}">
                <i class="bi bi-clipboard-check"></i>
                <span>
                    {{ auth()->user()->role === 'murid' ? 'Riwayat Laporan' : 'Laporan Kerusakan' }}
                </span>
            </a>
        @endif

        @if(auth()->user()->role === 'murid')
            <a href="{{ route('laporan.create') }}"
               class="menu-link {{ request()->routeIs('laporan.create', 'laporan.store') ? 'active' : '' }}">
                <i class="bi bi-pencil-square"></i>
                <span>Buat Laporan</span>
            </a>
        @endif

        @if(in_array(auth()->user()->role, ['admin', 'petugas_sarpras', 'guru']))
            <a href="{{ route('berita-acara.index') }}"
               class="menu-link {{ request()->routeIs('berita-acara.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                <span>Berita Acara</span>
            </a>
        @endif

        @if(auth()->user()->role === 'admin')
            {{-- Aktifkan setelah route dan halaman pengguna dibuat. --}}
            <a href="#" class="menu-link" title="Data Pengguna belum tersedia">
                <i class="bi bi-people"></i>
                <span>Data Pengguna</span>
            </a>
        @endif

        <hr class="sidebar-divider">

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="menu-link">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </button>
        </form>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div>
                <div class="text-secondary small">
                    Sistem Informasi Sarana dan Prasarana
                </div>
                <strong class="topbar-title">
                    @yield('heading', 'Dashboard')
                </strong>
            </div>

            <div class="text-end">
                <div class="fw-semibold">
                    {{ auth()->user()->name }}
                </div>
                <small class="user-role">
                    {{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }}
                </small>
            </div>
        </header>

        <section class="page-content">
            @yield('content')
        </section>
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
