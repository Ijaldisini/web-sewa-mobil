<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mobil</title>
    <style>
        * {
            overflow: hidden;
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

        .detail-container {
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

        .detail-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
            position: relative;
        }

        .detail-header h2 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .detail-header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .icon-large {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
            backdrop-filter: blur(10px);
        }

        .detail-body {
            padding: 40px 30px;
        }

        .info-card {
            background: #f8f9ff;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            padding: 20px 0;
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
            font-size: 13px;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 20px;
            color: #333;
            font-weight: 600;
            word-break: break-word;
        }

        .price-highlight {
            color: #667eea;
            font-size: 28px;
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

        .btn-edit {
            background: linear-gradient(135deg, #2196F3 0%, #1976d2 100%);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(33, 150, 243, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            color: white;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(244, 67, 54, 0.4);
        }

        .badge {
            display: inline-block;
            background: #e3f2fd;
            color: #1976d2;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 5px;
        }

        .meta-info {
            background: white;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            border: 2px solid #f0f0f0;
            text-align: center;
        }

        .meta-info p {
            color: #666;
            font-size: 13px;
            line-height: 1.6;
        }

        @media (max-width: 480px) {
            .detail-container {
                margin: 10px;
            }

            .detail-header {
                padding: 30px 20px;
            }

            .detail-header h2 {
                font-size: 24px;
            }

            .detail-body {
                padding: 30px 20px;
            }

            .info-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-icon {
                margin-bottom: 15px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .info-value {
                font-size: 18px;
            }

            .price-highlight {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="detail-container">
        <div class="detail-header">
            <div class="icon-large">📦</div>
            <h2>Detail Mobil</h2>
            <p>Informasi lengkap mobil yang dipilih</p>
        </div>

        <div class="detail-body">

            <div class="info-card">
                <div class="info-item">
                    <div class="info-icon">📝</div>
                    <div class="info-content">
                        <div class="info-label">Nama Mobil</div>
                        <div class="info-value"><?= htmlspecialchars($item['nama']) ?></div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">💰</div>
                    <div class="info-content">
                        <div class="info-label">Harga</div>
                        <div class="info-value price-highlight">
                            Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <a href="index.php?controller=item&action=index" class="btn btn-back">
                    <span>↩️</span>
                    Kembali
                </a>
                <a href="index.php?controller=item&action=form&id=<?= $item['id'] ?>" class="btn btn-edit">
                    <span>✏️</span>
                    Edit
                </a>
                <a href="index.php?controller=item&action=delete&id=<?= $item['id'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus item ini?\n\nNama: <?= htmlspecialchars($item['nama']) ?>\nHarga: Rp <?= number_format($item['harga'], 0, ',', '.') ?>')">
                    <span>🗑️</span>
                    Hapus
                </a>
            </div>
        </div>
    </div>
</body>

</html>