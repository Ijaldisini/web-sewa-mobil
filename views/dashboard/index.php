<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Customer</title>
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
            padding: 20px;
        }

        /* Navbar */
        .navbar {
            background: white;
            border-radius: 15px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto 30px;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
        }

        .navbar-brand-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }

        .nav-link {
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-link-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .nav-link-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .nav-link-logout {
            background: #ffebee;
            color: #d32f2f;
        }

        .nav-link-logout:hover {
            background: #ffcdd2;
            transform: translateY(-2px);
        }

        /* Container utama */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
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

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 40px;
            color: white;
        }

        .header h2 {
            font-size: 28px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .content {
            padding: 40px;
        }

        /* Search bar */
        .search-box {
            margin-bottom: 25px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-box::before {
            content: '🔍';
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
        }

        /* Grid mobil */
        .car-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        /* Card Mobil */
        .card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.25);
        }

        .car-name {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .car-price {
            font-size: 16px;
            color: #667eea;
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 50px;
            color: #777;
        }

        .empty-state span {
            font-size: 50px;
            display: block;
            opacity: 0.5;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <?php session_start(); ?>

    <div class="navbar">
        <div class="navbar-brand">
            <div class="navbar-brand-icon">🚗</div>
            <span>Rental Mobil</span>
        </div>

        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="index.php?controller=auth&action=logout" class="nav-link nav-link-logout">Logout</a>
        <?php else: ?>
            <a href="index.php?controller=auth&action=loginForm" class="nav-link nav-link-login">Admin Login</a>
        <?php endif; ?>
    </div>

    <div class="container">
        <div class="header">
            <h2>List Mobil yang Disewakan</h2>
        </div>

        <div class="content">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Cari mobil berdasarkan nama...">
            </div>

            <div class="car-grid" id="carList">
                <?php if (count($cars) > 0): ?>
                    <?php foreach ($cars as $car): ?>
                        <div class="card">
                            <div class="car-name"><?= htmlspecialchars($car['nama']) ?></div>
                            <div class="car-price">Rp <?= number_format($car['harga'], 0, ',', '.') ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">
                        <span>🚘</span>
                        <p>Tidak ada data mobil tersedia.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const cards = document.querySelectorAll('.card');
            let visibleCount = 0;

            cards.forEach(card => {
                const carName = card.querySelector('.car-name').textContent.toLowerCase();
                if (carName.includes(filter)) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            console.log("Total terlihat:", visibleCount);
        }
        document.getElementById('searchInput').addEventListener('keyup', searchTable);
    </script>


</body>

</html>