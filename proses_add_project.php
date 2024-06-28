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

// Tangkap data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $imageName = isset($_FILES["image"]["name"]) ? basename($_FILES["image"]["name"]) : '';
    
    // Proses upload gambar jika ada
    if (!empty($imageName)) {
        $targetDir = "uploads/";
        $targetFilePath = $targetDir . $imageName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Cek apakah file gambar valid
        $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // Upload file gambar
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // Query untuk memasukkan data proyek ke database
                $sql = "INSERT INTO project (title, image) VALUES ('$title', '$targetFilePath')";
                if ($conn->query($sql) === TRUE) {
                    echo '<div class="card">';
                    echo '<p>Proyek berhasil ditambahkan.</p>';
                    echo '</div>';
                    // Redirect atau refresh halaman project.php setelah berhasil tambah proyek
                    echo '<script>window.location.href = "project.php";</script>';
                } else {
                    echo '<div class="card">';
                    echo '<p>Error: ' . $sql . '<br>' . $conn->error . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<div class="card">';
                echo '<p>Gagal mengupload gambar.</p>';
                echo '</div>';
            }
        } else {
            echo '<div class="card">';
            echo '<p>Format file gambar tidak valid. Harap upload file JPG, JPEG, PNG, atau GIF.</p>';
            echo '</div>';
        }
    } else {
        echo '<div class="card">';
        echo '<p>Gambar tidak ditemukan.</p>';
        echo '</div>';
    }
}

// Tutup koneksi
$conn->close();
?>
