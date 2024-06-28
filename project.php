<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-button, .delete-button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .edit-button {
            background-color: #4caf50;
            color: white;
            margin-right: 5px;
        }

        .delete-button {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="dasbor.php">Dasbor</a>
        <a href="article.php">Artikel</a>
        <a href="#">Skill</a>
        <a href="project.php">Project</a>
        <a href="#">Experience</a>
        <a href="contact.php">Kontak</a>
    </div>

    <div class="content">
        <h1>Daftar Proyek</h1>

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

        // Query untuk mengambil data proyek
        $sql = "SELECT id, title, image FROM project";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nama Proyek</th>';
            echo '<th>Gambar</th>';
            echo '<th>Aksi</th>';
            echo '</tr>';

            // Output data dari setiap row
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["title"] . '</td>';
                echo '<td><img src="' . $row["image"] . '" alt="' . $row["title"] . '" style="max-width: 100px;"></td>';
                echo '<td>';
                echo '<button class="edit-button" onclick="editProject(' . $row["id"] . ')">Edit</button>';
                echo '<form method="POST" style="display: inline;">';
                echo '<input type="hidden" name="delete_id" value="' . $row["id"] . '">';
                echo '<button type="submit" class="delete-button">Delete</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo "Tidak ada proyek.";
        }

        // Tutup koneksi
        $conn->close();
        ?>

        <!-- Script JavaScript untuk aksi edit -->
        <script>
            function editProject(id) {
                // Redirect ke halaman edit_project.php dengan mengirimkan parameter ID proyek
                window.location.href = 'edit_project.php?id=' + id;
            }
        </script>
    </div>
</body>
</html>
