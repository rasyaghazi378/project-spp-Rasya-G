<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Pembayaran SPP</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #F8FAFC; /* Slate 50 */
            --card-bg: #FFFFFF;
            --text-dark: #1E293B; /* Slate 800 */
            --text-gray: #64748B; /* Slate 500 */
            --primary-blue: #4F46E5; /* Indigo 600 */
            --primary-blue-hover: #4338CA; /* Indigo 700 */
            --red-text: #EF4444; /* Red 500 */
            --red-hover: rgba(239, 68, 68, 0.1);
            --border-color: #E2E8F0; /* Slate 200 */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--border-color);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            display: flex;
            flex-direction: column;
        }

        .nav-title {
            color: var(--text-dark);
            font-size: 22px;
            font-weight: 700;
        }

        .nav-subtitle {
            color: var(--text-gray);
            font-size: 14px;
            margin-top: 4px;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--red-text);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            padding: 8px 16px;
            border-radius: 8px;
            transition: background-color 0.2s;
            border: none;
            background: none;
            cursor: pointer;
        }

        .btn-logout:hover {
            background-color: var(--red-hover);
        }

        /* MAIN CONTENT */
        .main-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .search-card {
            background-color: var(--card-bg);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid var(--border-color);
        }

        .section-title {
            color: var(--text-dark);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* SEARCH BAR */
        .search-group {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .search-input-wrapper {
            position: relative;
            flex-grow: 1;
        }

        .search-input-wrapper svg {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
        }

        .search-input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 1.5px solid var(--border-color);
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            color: var(--text-dark);
            transition: border-color 0.2s;
        }

        .search-input:focus {
            border-color: var(--primary-blue);
        }

        .btn-search {
            background-color: var(--primary-blue);
            color: white;
            border: none;
            padding: 0 25px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-search:hover {
            background-color: var(--primary-blue-hover);
        }

        /* STUDENT LIST */
        .student-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .student-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            background-color: white;
            transition: border-color 0.2s;
            cursor: pointer;
        }

        .student-card:hover {
            border-color: var(--primary-blue);
        }

        .student-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .student-name {
            color: var(--text-dark);
            font-weight: 600;
            font-size: 16px;
        }

        .student-details {
            color: var(--text-gray);
            font-size: 14px;
        }

        .student-status {
            text-align: right;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .amount-due {
            color: var(--red-text);
            font-weight: 600;
            font-size: 16px;
        }

        .status-label {
            color: var(--text-gray);
            font-size: 13px;
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
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-brand">
            <h1 class="nav-title">Kasir Pembayaran SPP</h1>
            <p class="nav-subtitle">Petugas: {{ auth()->user()->name ?? 'Staff Kasir' }}</p>
        </div>

        <form action="{{ route('logout') ?? '#' }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Keluar
            </button>
        </form>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="main-container">
        <div class="search-card">
            <h2 class="section-title">Cari Siswa</h2>

            <div class="search-group">
                <div class="search-input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" class="search-input" placeholder="Masukkan NIS atau nama siswa...">
                </div>
                <button class="btn-search">Cari</button>
            </div>

            <div class="student-list">
                <!-- Siswa 1 -->
                <div class="student-card">
                    <div class="student-info">
                        <span class="student-name">Ahmad Fauzi</span>
                        <span class="student-details">NIS: 2024001 &bull; X-IPA 1</span>
                    </div>
                    <div class="student-status">
                        <span class="amount-due">Rp 1.050.000</span>
                        <span class="status-label">Tunggakan</span>
                    </div>
                </div>

                <!-- Siswa 2 -->
                <div class="student-card">
                    <div class="student-info">
                        <span class="student-name">Siti Aminah</span>
                        <span class="student-details">NIS: 2024002 &bull; X-IPA 2</span>
                    </div>
                    <div class="student-status">
                        <span class="amount-due">Rp 350.000</span>
                        <span class="status-label">Tunggakan</span>
                    </div>
                </div>

                <!-- Siswa 3 -->
                <div class="student-card">
                    <div class="student-info">
                        <span class="student-name">Budi Santoso</span>
                        <span class="student-details">NIS: 2024003 &bull; X-IPS 1</span>
                    </div>
                    <div class="student-status">
                        <span class="amount-due">Rp 700.000</span>
                        <span class="status-label">Tunggakan</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="help-btn">?</div>

</body>
</html>
