<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kontak</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path CSS dengan lokasi file CSS Anda -->
    <style>
        /* Tambahkan CSS tambahan di sini sesuai kebutuhan */
        .navbar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            overflow-y: auto;
        }

        .navbar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            margin-bottom: 10px;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        .content {
            margin-left: 220px; /* Sesuaikan dengan lebar sidebar */
            padding: 20px;
        }

        .card {
            background: #f4f4f4;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group textarea {
            height: 150px;
            resize: vertical;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#dashboard">Dasbor</a>
        <a href="article.php">Artikel</a>
        <a href="#">Skill</a>
        <a href="project.php">Project</a>
        <a href="#">Experience</a>
        <a href="contact.php">Kontak</a>
    </div>

    <div class="content">
        <h1>Edit Kontak</h1>

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

        // Fungsi untuk mengambil data kontak berdasarkan ID
        if (isset($_POST['edit_id'])) {
            $edit_id = $_POST['edit_id'];
            $sql_select = "SELECT * FROM contact WHERE id = $edit_id";
            $result = $conn->query($sql_select);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nama_lengkap = $row['nama_lengkap'];
                $telepon = $row['telepon'];
                $email = $row['email'];
                $pesan = $row['pesan'];
            } else {
                echo '<div class="card">';
                echo '<p>Data kontak tidak ditemukan.</p>';
                echo '</div>';
                exit; // Hentikan eksekusi script jika data tidak ditemukan
            }
        }

        // Proses update kontak ke database
        if (isset($_POST['update_contact'])) {
            $edit_id = $_POST['edit_id'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $telepon = $_POST['telepon'];
            $email = $_POST['email'];
            $pesan = $_POST['pesan'];

            $sql_update = "UPDATE contact SET nama_lengkap='$nama_lengkap', telepon='$telepon', email='$email', pesan='$pesan' WHERE id=$edit_id";

            if ($conn->query($sql_update) === TRUE) {
                echo '<div class="card">';
                echo '<p>Kontak berhasil diperbarui.</p>';
                echo '</div>';
            } else {
                echo '<div class="card">';
                echo '<p>Error: ' . $sql_update . '<br>' . $conn->error . '</p>';
                echo '</div>';
            }
        }

        // Tutup koneksi
        $conn->close();
        ?>

        <!-- Form untuk edit kontak -->
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo isset($nama_lengkap) ? $nama_lengkap : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="telepon">No. Telepon:</label>
                <input type="text" id="telepon" name="telepon" value="<?php echo isset($telepon) ? $telepon : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="pesan">Pesan:</label>
                <textarea id="pesan" name="pesan" required><?php echo isset($pesan) ? $pesan : ''; ?></textarea>
            </div>
            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
            <div class="form-group">
                <button type="submit" name="update_contact">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
