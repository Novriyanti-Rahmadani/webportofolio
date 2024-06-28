<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path CSS dengan lokasi file CSS Anda -->
    <style>
        /* Tambahkan CSS tambahan di sini sesuai kebutuhan */
        .content {
            margin: 20px;
        }

        .card {
            background: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        button[type="submit"], button[type="button"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover, button[type="button"]:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Edit Artikel</h1>

        <div class="card">
            <?php
            // Koneksi ke database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "admin";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Ambil ID artikel yang akan diedit (misalnya dari parameter URL)
            $artikel_id = $_GET['id']; // Pastikan ID diteruskan melalui URL

            // Query untuk mengambil data artikel berdasarkan ID
            $sql = "SELECT * FROM artikel WHERE id = $artikel_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nama_artikel = htmlspecialchars($row["nama_artikel"], ENT_QUOTES, 'UTF-8');
                $deskripsi = htmlspecialchars($row["deskripsi"], ENT_QUOTES, 'UTF-8');
                $gambar = htmlspecialchars($row["gambar"], ENT_QUOTES, 'UTF-8');
            ?>
                <form action="proses_edit_artikel.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="artikel_id" value="<?php echo $artikel_id; ?>">
                    <div class="form-group">
                        <label for="nama_artikel">Nama Artikel</label>
                        <input type="text" id="nama_artikel" name="nama_artikel" value="<?php echo $nama_artikel; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" required><?php echo $deskripsi; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" id="gambar" name="gambar">
                        <?php if ($gambar): ?>
                            <p>Gambar saat ini:</p>
                            <img src="uploads/<?php echo $gambar; ?>" alt="<?php echo $nama_artikel; ?>" style="max-width: 200px;">
                        <?php endif; ?>
                    </div>
                    <button type="submit">Simpan Perubahan</button>
                    <button type="button" onclick="history.back()">Batal</button>
                </form>
            <?php
            } else {
                echo "<p>Artikel tidak ditemukan.</p>";
            }

            // Tutup koneksi
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
