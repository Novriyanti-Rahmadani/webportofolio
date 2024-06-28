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

// Ambil data dari form tambah artikel
$nama_artikel = $_POST['nama_artikel'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];
$temp_file = $_FILES['gambar']['tmp_name'];
$upload_dir = 'uploads/'; // Direktori tempat menyimpan gambar

// Pindahkan file gambar yang diupload ke direktori yang ditentukan
$new_file = $upload_dir . $gambar;
if (move_uploaded_file($temp_file, $new_file)) {
    // Query untuk menambah artikel baru
    $sql = "INSERT INTO artikel (nama_artikel, deskripsi, gambar) VALUES (?, ?, ?)";

    // Persiapkan statement
    $stmt = $conn->prepare($sql);

    // Periksa persiapan statement
    if ($stmt === false) {
        die("Prepare statement error: " . $conn->error);
    }

    // Bind parameter
    $stmt->bind_param("sss", $nama_artikel, $deskripsi, $gambar);

    // Eksekusi statement
    if ($stmt->execute()) {
        echo "Artikel berhasil ditambah.";
    } else {
        echo "Error dalam menambah artikel: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
} else {
    echo "Gagal mengupload gambar.";
}

// Tutup koneksi
$conn->close();

// Redirect kembali ke halaman artikel
header("Location: article.php");
exit;
?>
