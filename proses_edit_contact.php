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

// Ambil data dari $_POST
$contact_id = isset($_POST['contact_id']) ? $_POST['contact_id'] : null;
$nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : null;
$telepon = isset($_POST['telepon']) ? $_POST['telepon'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$pesan = isset($_POST['pesan']) ? $_POST['pesan'] : null;

// Query untuk update data kontak
$sql = "UPDATE contact SET 
        nama_lengkap = '$nama_lengkap',
        telepon = '$telepon',
        email = '$email',
        pesan = '$pesan'
        WHERE id = $contact_id";

if ($conn->query($sql) === TRUE) {
    echo "Kontak berhasil diupdate.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
