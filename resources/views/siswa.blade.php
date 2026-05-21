<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - SPP System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #F8FAFC; /* Slate 50 */
            --card-bg: #FFFFFF;
            --primary-purple: #563BFA; /* Matches the vibrant purple/blue */
            --primary-purple-hover: #4B33E5;
            --card-purple: rgba(255, 255, 255, 0.15);
            --text-dark: #1E293B; /* Slate 800 */
            --text-gray: #64748B; /* Slate 500 */
            --border-color: #E2E8F0; /* Slate 200 */
            --green-text: #4ADE80; /* Light green for dark bg */
            --green-text-dark: #16A34A; /* Green for light bg */
            --yellow-text: #FDE047; /* Yellow for dark bg */
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
            display: flex;
            flex-direction: column;
        }

        /* HEADER BANNER */
        .header-banner {
            background-color: var(--primary-purple);
            padding: 40px;
            color: white;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 40px;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }

        .user-info h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .user-info p {
            font-size: 15px;
            opacity: 0.8;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            padding: 10px 16px;
            border-radius: 10px;
            background-color: var(--card-purple);
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-logout:hover {
            background-color: rgba(255, 255, 255, 0.25);
        }

        /* STATS CARDS */
        .stats-wrapper {
            max-width: 1000px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--card-purple);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            flex-direction: column;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
        }

        .text-green { color: var(--green-text); }
        .text-yellow { color: var(--yellow-text); }

        /* PROGRESS BAR */
        .progress-section {
            max-width: 1000px;
            margin: 0 auto;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 10px;
            opacity: 0.9;
        }

        .progress-track {
            background-color: rgba(0, 0, 0, 0.2);
            height: 12px;
            border-radius: 6px;
            overflow: hidden;
            width: 100%;
        }

        .progress-fill {
            background-color: #10B981; /* Emerald 500 */
            height: 100%;
            border-radius: 6px;
        }

        /* MAIN CONTENT */
        .main-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
            width: 100%;
        }

        .history-card {
            background-color: var(--card-bg);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
        }

        .history-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .history-title {
            color: var(--text-dark);
            font-size: 20px;
            font-weight: 600;
        }

        .btn-download {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--primary-purple);
            font-weight: 600;
            font-size: 15px;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* HISTORY LIST */
        .history-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .history-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px;
            border: 1px solid #E0E7FF; /* Light indigo border */
            border-radius: 12px;
            background-color: white;
        }

        .item-left {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .icon-check {
            color: var(--green-text-dark);
            background-color: #DCFCE7; /* Green 100 */
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .icon-check svg {
            width: 16px;
            height: 16px;
        }

        .item-details {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .item-title {
            color: var(--text-dark);
            font-weight: 600;
            font-size: 16px;
        }

        .item-meta {
            color: var(--text-gray);
            font-size: 14px;
        }

        .item-bottom {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 6px;
        }

        .item-date {
            color: var(--text-gray);
            font-size: 14px;
        }

        .badge-lunas {
            background-color: #DCFCE7;
            color: var(--green-text-dark);
            font-size: 12px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .item-right {
            text-align: right;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }

        .item-amount {
            color: var(--text-dark);
            font-weight: 700;
            font-size: 18px;
        }

        .btn-cetak {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--primary-purple);
            font-weight: 600;
            font-size: 14px;
            background: none;
            border: none;
            cursor: pointer;
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

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .history-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            .item-right {
                width: 100%;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }
    </style>
</head>
<body>

    <!-- HEADER BANNER -->
    <header class="header-banner">
        <div class="header-top">
            <div class="user-info">
                <h1>{{ auth()->user()->name ?? 'Ahmad Fauzi' }}</h1>
                <p>NIS: {{ auth()->user()->username ?? '2024001' }} &bull; Kelas X-IPA 1</p>
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
        </div>

        <!-- STATS -->
        <div class="stats-wrapper">
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-label">Total Tagihan</span>
                    <span class="stat-value">Rp 3.500.000</span>
                </div>
                <div class="stat-card">
                    <span class="stat-label">Sudah Dibayar</span>
                    <span class="stat-value text-green">Rp 2.450.000</span>
                </div>
                <div class="stat-card">
                    <span class="stat-label">Sisa Tunggakan</span>
                    <span class="stat-value text-yellow">Rp 1.050.000</span>
                </div>
            </div>
        </div>

        <!-- PROGRESS BAR -->
        <div class="progress-section">
            <div class="progress-header">
                <span>Progress Pembayaran</span>
                <span>70%</span>
            </div>
            <div class="progress-track">
                <div class="progress-fill" style="width: 70%;"></div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="main-container">
        <div class="history-card">
            <div class="history-header">
                <h2 class="history-title">Riwayat Pembayaran</h2>
                <button class="btn-download">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download
                </button>
            </div>

            <div class="history-list">
                <!-- History Item 1 -->
                <div class="history-item">
                    <div class="item-left">
                        <div class="icon-check">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="item-details">
                            <span class="item-title">SPP April 2026</span>
                            <span class="item-meta">No. Kwitansi: INV-2024001-04-001</span>
                            <div class="item-bottom">
                                <span class="item-date">Tanggal: 2026-04-15</span>
                                <span class="badge-lunas">Lunas</span>
                            </div>
                        </div>
                    </div>
                    <div class="item-right">
                        <span class="item-amount">Rp 350.000</span>
                        <button class="btn-cetak">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="16" height="16">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            Cetak
                        </button>
                    </div>
                </div>
                
                <!-- History Item 2 Placeholder -->
                <!-- You can loop through data here later -->
            </div>
        </div>
    </main>

    <div class="help-btn">?</div>

</body>
</html>
