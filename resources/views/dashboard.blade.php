<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SPP System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-bg: #312E81; /* Indigo 900 */
            --sidebar-active: #4F46E5; /* Indigo 600 */
            --sidebar-hover: #4338CA;
            --main-bg: #F8FAFC; /* Slate 50 */
            --card-bg: #FFFFFF;
            --text-dark: #1E293B; /* Slate 800 */
            --text-gray: #64748B; /* Slate 500 */
            --text-light: #F8FAFC;
            --border-color: #E2E8F0; /* Slate 200 */
            
            /* Card Icon Colors */
            --icon-blue: #3B82F6;
            --icon-green: #10B981;
            --icon-red: #EF4444;
            --icon-purple: #A855F7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            background-color: var(--main-bg);
            min-height: 100vh;
        }

        /* SIDEBAR STYLES */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: var(--text-light);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 30px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .sidebar-header p {
            font-size: 13px;
            color: #94A3B8; /* Slate 400 */
        }

        .nav-menu {
            padding: 20px 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 10px;
            color: var(--text-light);
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .nav-item.active {
            background-color: var(--sidebar-active);
        }

        .nav-item svg {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            opacity: 0.8;
        }

        .nav-item.active svg {
            opacity: 1;
        }

        .sidebar-footer {
            padding: 20px 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-item-logout {
            color: #FDA4AF; /* Rose 300 */
        }
        .nav-item-logout:hover {
            background-color: rgba(244, 63, 94, 0.1); /* Rose 500 with opacity */
        }

        /* MAIN CONTENT STYLES */
        .main-content {
            margin-left: 260px;
            flex-grow: 1;
            padding: 40px;
        }

        .page-header {
            margin-bottom: 40px;
        }

        .page-header h1 {
            color: var(--text-dark);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .page-header p {
            color: var(--text-gray);
            font-size: 15px;
        }

        /* STATS CARDS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background-color: var(--card-bg);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid var(--border-color);
        }

        .stat-info {
            display: flex;
            flex-direction: column;
        }

        .stat-label {
            color: var(--text-gray);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .stat-value {
            color: var(--text-dark);
            font-size: 24px;
            font-weight: 700;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .stat-icon svg {
            width: 24px;
            height: 24px;
            color: white;
        }

        .icon-blue { background-color: var(--icon-blue); }
        .icon-green { background-color: var(--icon-green); }
        .icon-red { background-color: var(--icon-red); }
        .icon-purple { background-color: var(--icon-purple); }

        /* RECENT USERS TABLE SECTION */
        .table-section {
            background-color: var(--card-bg);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid var(--border-color);
        }

        .table-section h3 {
            color: var(--text-dark);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table th {
            text-align: left;
            padding: 12px 16px;
            color: var(--text-gray);
            font-size: 14px;
            font-weight: 500;
            border-bottom: 1px solid var(--border-color);
        }

        .custom-table td {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-dark);
            font-size: 14px;
        }

        .help-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            color: var(--text-dark);
            font-weight: 600;
            cursor: pointer;
            border: 1px solid var(--border-color);
            z-index: 100;
        }

    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Admin Panel</h2>
            <p>SPP System</p>
        </div>
        
        <nav class="nav-menu">
            <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                Dashboard
            </a>
            <a href="{{ route('pengguna') }}" class="nav-item {{ request()->routeIs('pengguna') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Kelola Pengguna
            </a>
            <a href="{{ route('kategori') }}" class="nav-item {{ request()->routeIs('kategori') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Kategori Pembayaran
            </a>
            <a href="{{ route('laporan') }}" class="nav-item {{ request()->routeIs('laporan') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Laporan
            </a>
            <a href="{{ route('pengaturan') }}" class="nav-item {{ request()->routeIs('pengaturan') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Pengaturan
            </a>
        </nav>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="nav-item nav-item-logout" style="width:100%; border:none; background:none; text-align:left; font-size:inherit; cursor:pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <header class="page-header">
            <h1>Dashboard {{ ucfirst(auth()->user()->role ?? 'Admin') }}</h1>
            <p>Selamat datang kembali, {{ auth()->user()->name ?? 'Guest' }}</p>
        </header>

        <!-- STATS -->
        <div class="stats-grid">
            <!-- Stat 1 -->
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Total Siswa</span>
                    <span class="stat-value">450</span>
                </div>
                <div class="stat-icon icon-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Pembayaran Bulan Ini</span>
                    <span class="stat-value">Rp 125.5 Jt</span>
                </div>
                <div class="stat-icon icon-green">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Tunggakan</span>
                    <span class="stat-value">Rp 15.2 Jt</span>
                </div>
                <div class="stat-icon icon-red">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>

            <!-- Stat 4 -->
            <div class="stat-card">
                <div class="stat-info">
                    <span class="stat-label">Petugas Aktif</span>
                    <span class="stat-value">5</span>
                </div>
                <div class="stat-icon icon-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- TABLE SECTION -->
        <div class="table-section">
            <h3>Pengguna Terbaru</h3>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table row placeholders if needed -->
                    <!-- <tr>
                        <td>Ahmad</td>
                        <td>Siswa</td>
                        <td>Aktif</td>
                        <td>2024-04-15</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </main>

    <div class="help-btn">?</div>

</body>
</html>
