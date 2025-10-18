<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($item) ? 'Edit' : 'Tambah' ?> Mobil</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        .form-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
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

        .form-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .form-header h2 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .form-header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .form-body {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        .form-group label span {
            color: #f44336;
            margin-left: 3px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group .input-prefix {
            position: relative;
        }

        .form-group .input-prefix input {
            padding-left: 45px;
        }

        .form-group .input-prefix::before {
            content: 'Rp';
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-weight: 600;
            font-size: 15px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
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

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-cancel {
            background: #f5f5f5;
            color: #666;
        }

        .btn-cancel:hover {
            background: #e0e0e0;
            transform: translateY(-2px);
        }

        .input-info {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #4caf50;
        }

        .alert-error {
            background: #ffebee;
            color: #c62828;
            border-left: 4px solid #f44336;
        }

        @media (max-width: 480px) {
            .form-container {
                margin: 10px;
            }
            
            .form-header {
                padding: 30px 20px;
            }

            .form-header h2 {
                font-size: 24px;
            }

            .form-body {
                padding: 30px 20px;
            }

            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>
                <span><?= isset($item) ? '✏️' : '➕' ?></span>
                <?= isset($item) ? 'Edit Item' : 'Tambah Mobil Baru' ?>
            </h2>
            <p><?= isset($item) ? 'Perbarui informasi item' : 'Isi form di bawah untuk menambah mobil' ?></p>
        </div>
        
        <div class="form-body">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <span>✓</span>
                    <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <span>✕</span>
                    <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="index.php?controller=item&action=<?= isset($item) ? 'update&id='.$item['id'] : 'store' ?>" id="itemForm">
                <div class="form-group">
                    <label for="nama">
                        Nama Item<span>*</span>
                    </label>
                    <input 
                        type="text" 
                        id="nama" 
                        name="nama" 
                        value="<?= htmlspecialchars($item['nama'] ?? '') ?>" 
                        placeholder="Contoh: Bugatti Chiron"
                        required 
                        autofocus
                    >
                    <div class="input-info">Masukkan nama item yang jelas dan deskriptif</div>
                </div>
                
                <div class="form-group">
                    <label for="harga">
                        Harga<span>*</span>
                    </label>
                    <div class="input-prefix">
                        <input 
                            type="number" 
                            id="harga" 
                            name="harga" 
                            value="<?= $item['harga'] ?? '' ?>" 
                            placeholder="0"
                            min="0"
                            step="1000"
                            required
                        >
                    </div>
                    <div class="input-info">Masukkan harga dalam Rupiah (tanpa titik atau koma)</div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">
                        <span>💾</span>
                        <?= isset($item) ? 'Update Item' : 'Simpan Item' ?>
                    </button>
                    <a href="index.php?controller=item&action=index" class="btn btn-cancel">
                        <span>↩️</span>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const hargaInput = document.getElementById('harga');
        
        hargaInput.addEventListener('blur', function() {
            if (this.value) {
                const value = Math.round(parseFloat(this.value) / 1000) * 1000;
                this.value = value;
            }
        });

        document.getElementById('itemForm').addEventListener('submit', function(e) {
            const nama = document.getElementById('nama').value.trim();
            const harga = document.getElementById('harga').value;

            if (nama === '') {
                e.preventDefault();
                alert('Nama item tidak boleh kosong!');
                document.getElementById('nama').focus();
                return false;
            }

            if (harga === '' || parseFloat(harga) <= 0) {
                e.preventDefault();
                alert('Harga harus lebih dari 0!');
                document.getElementById('harga').focus();
                return false;
            }
        });
    </script>
</body>
</html>