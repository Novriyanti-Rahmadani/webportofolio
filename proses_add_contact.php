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

// Ambil data dari form tambah kontak
$nama_lengkap = $_POST['nama_lengkap'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

// Query untuk menambah kontak baru
$sql = "INSERT INTO contact (nama_lengkap, telepon, email, pesan) VALUES (?, ?, ?, ?)";

// Persiapkan statement
$stmt = $conn->prepare($sql);

// Periksa persiapan statement
if ($stmt === false) {
    die("Prepare statement error: " . $conn->error);
}

// Bind parameter
$stmt->bind_param("ssss", $nama_lengkap, $telepon, $email, $pesan);

// Eksekusi statement
if ($stmt->execute()) {
    // Redirect ke halaman contact.php
    header("Location: contact.php");
    exit();
} else {
    echo "Error dalam menambah kontak: " . $stmt->error;
}

// Tutup statement
$stmt->close();

// Tutup koneksi
$conn->close();
?>
