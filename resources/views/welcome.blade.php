<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPP System</title>
    <!-- Menggunakan font Inter dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #4F46E5; /* Indigo 600 style blue */
            --primary-blue-hover: #4338CA;
            --bg-blue: #EEF2FF; /* Indigo 50 */
            --card-bg: #FFFFFF;
            --text-dark: #111827; /* Gray 900 */
            --text-gray: #6B7280; /* Gray 500 */
            --border-light: #E5E7EB; /* Gray 200 */
            --icon-bg-gray: #F3F4F6; /* Gray 100 */
            --icon-bg-blue: #4F46E5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            background-color: var(--bg-blue);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            background: var(--card-bg);
            width: 100%;
            max-width: 420px;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            text-align: center;
        }

        .logo-container {
            width: 64px;
            height: 64px;
            background-color: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
        }

        .logo-container svg {
            color: white;
            width: 32px;
            height: 32px;
        }

        h1 {
            color: var(--text-dark);
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            color: var(--text-gray);
            font-size: 14px;
            margin-bottom: 30px;
        }

        .role-options {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }

        .role-card {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1.5px solid var(--border-light);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: left;
            background-color: white;
        }

        .role-card:hover {
            border-color: var(--primary-blue);
            background-color: #F8FAFC;
        }

        .role-card.active {
            border-color: var(--primary-blue);
            background-color: #F5F3FF; /* Light indigo */
        }

        .icon-box {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--icon-bg-gray);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }

        .icon-box svg {
            width: 20px;
            height: 20px;
            color: var(--text-gray);
        }

        .role-card.active .icon-box {
            background-color: var(--primary-blue);
        }

        .role-card.active .icon-box svg {
            color: white;
        }

        .role-info {
            display: flex;
            flex-direction: column;
        }

        .role-title {
            color: var(--text-dark);
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 2px;
        }

        .role-desc {
            color: var(--text-gray);
            font-size: 13px;
        }

        .btn-continue {
            width: 100%;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-continue:hover {
            background-color: var(--primary-blue-hover);
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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            color: var(--text-dark);
            font-weight: 600;
            cursor: pointer;
            border: 1px solid var(--border-light);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="logo-container">
            <!-- Icon Topi Kelulusan (Graduation Cap) -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
        </div>

        <h1>SPP System</h1>
        <p class="subtitle">Sistem Pembayaran Sekolah</p>

        <!-- Form untuk dikirim ke backend Laravel -->
        <form action="/login" method="POST">
            @csrf
            <div class="role-options">
                <!-- Opsi Admin -->
                <label class="role-card" for="role-admin">
                    <input type="radio" name="role" id="role-admin" value="admin" style="display:none;">
                    <div class="icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="role-info">
                        <span class="role-title">Admin</span>
                        <span class="role-desc">Kelola sistem</span>
                    </div>
                </label>

                <!-- Opsi Petugas -->
                <label class="role-card active" for="role-petugas">
                    <input type="radio" name="role" id="role-petugas" value="petugas" checked style="display:none;">
                    <div class="icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="role-info">
                        <span class="role-title">Petugas</span>
                        <span class="role-desc">Input pembayaran</span>
                    </div>
                </label>

                <!-- Opsi Siswa -->
                <label class="role-card" for="role-siswa">
                    <input type="radio" name="role" id="role-siswa" value="siswa" style="display:none;">
                    <div class="icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                    </div>
                    <div class="role-info">
                        <span class="role-title">Siswa</span>
                        <span class="role-desc">Lihat pembayaran</span>
                    </div>
                </label>
            </div>

            <!-- Input Username & Password -->
            <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 25px; text-align: left;">
                @error('username')
                    <div style="color: #ef4444; font-size: 13px; text-align: center; background-color: #fef2f2; padding: 10px; border-radius: 8px;">{{ $message }}</div>
                @enderror
                <div>
                    <label style="display: block; font-size: 14px; font-weight: 500; color: var(--text-dark); margin-bottom: 5px;">Username / NISN</label>
                    <input type="text" name="username" required placeholder="Masukkan username" style="width: 100%; padding: 12px 15px; border: 1.5px solid var(--border-light); border-radius: 10px; font-size: 14px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='var(--primary-blue)'" onblur="this.style.borderColor='var(--border-light)'">
                </div>
                <div>
                    <label style="display: block; font-size: 14px; font-weight: 500; color: var(--text-dark); margin-bottom: 5px;">Password</label>
                    <input type="password" name="password" required placeholder="Masukkan password" style="width: 100%; padding: 12px 15px; border: 1.5px solid var(--border-light); border-radius: 10px; font-size: 14px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='var(--primary-blue)'" onblur="this.style.borderColor='var(--border-light)'">
                </div>
            </div>

            <button type="submit" class="btn-continue">Lanjutkan</button>
        </form>
    </div>

    <!-- Tombol Help di Kanan Bawah -->
    <div class="help-btn">?</div>

    <script>
        // Script untuk menangani efek klik (mengubah warna outline dan background) pada opsi role
        const cards = document.querySelectorAll('.role-card');
        const radios = document.querySelectorAll('input[name="role"]');

        cards.forEach((card, index) => {
            card.addEventListener('click', () => {
                // Hapus kelas 'active' dari semua opsi
                cards.forEach(c => c.classList.remove('active'));
                
                // Tambahkan kelas 'active' ke opsi yang diklik
                card.classList.add('active');
                
                // Centang radio button yang tersembunyi
                radios[index].checked = true;
            });
        });
    </script>
</body>
</html>
