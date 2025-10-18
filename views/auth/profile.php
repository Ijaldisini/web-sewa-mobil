<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            overscroll-behavior: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .profile-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 600px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
            position: relative;
        }

        .avatar-container {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 50px;
            backdrop-filter: blur(10px);
            border: 4px solid rgba(255, 255, 255, 0.3);
        }

        .profile-header h2 {
            font-size: 28px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .profile-header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .profile-body {
            padding: 40px 30px;
        }

        .info-card {
            background: #f8f9ff;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .info-item {
            display: flex;
            align-items: center;
            padding: 18px 0;
            border-bottom: 2px solid #e8e8ff;
        }

        .info-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-item:first-child {
            padding-top: 0;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-size: 12px;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 17px;
            color: #333;
            font-weight: 600;
            word-break: break-all;
        }

        .password-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .password-hidden {
            font-family: 'Courier New', monospace;
            letter-spacing: 3px;
            color: #667eea;
        }

        .toggle-password {
            background: #667eea;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .toggle-password:hover {
            background: #5568d3;
            transform: scale(1.05);
        }

        .badge {
            display: inline-block;
            background: #e3f2fd;
            color: #1976d2;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 14px 20px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            text-align: center;
        }

        .btn-back {
            background: #f5f5f5;
            color: #666;
        }

        .btn-back:hover {
            background: #e0e0e0;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-logout {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            color: white;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(244, 67, 54, 0.4);
        }

        .security-notice {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 13px;
            color: #856404;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .security-notice-icon {
            font-size: 20px;
            flex-shrink: 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 2px solid #e8e8ff;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
        }

        .stat-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 12px;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 20px;
            font-weight: 700;
            color: #667eea;
        }

        @media (max-width: 480px) {
            .profile-container {
                margin: 10px;
            }

            .profile-header {
                padding: 30px 20px;
            }

            .profile-header h2 {
                font-size: 24px;
            }

            .profile-body {
                padding: 30px 20px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .info-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-icon {
                margin-bottom: 10px;
            }

            .password-container {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="avatar-container">👤</div>
            <h2><?= htmlspecialchars($user['username']) ?></h2>
            <p>Informasi Akun Anda</p>
        </div>

        <div class="profile-body">
            <div class="security-notice">
                <span class="security-notice-icon">⚠️</span>
                <div>
                    <strong>Security Notice:</strong> Your password is displayed for development purposes only.
                    In a production environment, passwords should never be displayed or logged in any form.
                </div>
            </div>

            <div class="stats-grid" style="display: flex; justify-content: center;">
                <div class="stat-card">
                    <div class="stat-icon">⏱️</div>
                    <div class="stat-label">Status</div>
                    <div class="stat-value" style="color: #4caf50;">Active</div>
                </div>
            </div>


            <div class="info-card">
                <div class="info-item">
                    <div class="info-icon">👤</div>
                    <div class="info-content">
                        <div class="info-label">Username</div>
                        <div class="info-value"><?= htmlspecialchars($user['username']) ?></div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">🔐</div>
                    <div class="info-content">
                        <div class="info-label">Password</div>
                        <div class="password-container">
                            <div class="info-value">
                                <span id="passwordDisplay" class="password-hidden">••••••••</span>
                                <span id="passwordReal" style="display: none;"><?= htmlspecialchars($user['password']) ?></span>
                            </div>
                            <button class="toggle-password" onclick="togglePassword()">
                                <span id="toggleText">Tampilkan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="index.php?controller=item&action=index" class="btn btn-back">
                    <span>⬅️</span>
                    Kembali
                </a>
                <a href="index.php?controller=auth&action=logout" class="btn btn-logout">
                    <span>🚪</span>
                    Logout
                </a>
            </div>
        </div>
    </div>

    <script>
        const logoutLinks = document.querySelectorAll('.btn-logout');
        logoutLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const href = this.getAttribute('href');

                Swal.fire({
                    title: 'Yakin ingin logout?',
                    text: 'Anda akan keluar dari sesi ini.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, logout',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href;
                    }
                });
            });
        });

        let passwordVisible = false;

        function togglePassword() {
            const passwordDisplay = document.getElementById('passwordDisplay');
            const passwordReal = document.getElementById('passwordReal');
            const toggleText = document.getElementById('toggleText');

            passwordVisible = !passwordVisible;

            if (passwordVisible) {
                passwordDisplay.style.display = 'none';
                passwordReal.style.display = 'inline';
                toggleText.textContent = 'Sembunyikan';
            } else {
                passwordDisplay.style.display = 'inline';
                passwordReal.style.display = 'none';
                toggleText.textContent = 'Tampilkan';
            }
        }
    </script>
</body>

</html>