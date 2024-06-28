<?php
session_start();

// Ubah sesuai dengan informasi database Anda
$host = 'localhost';
$dbname = 'admin';
$username = 'root';
$password = '';

try {
    // Buat koneksi ke database menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil nilai dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa kecocokan username dan password
    $query = "SELECT * FROM login_user WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':username' => $username, ':password' => $password));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Login berhasil, arahkan ke halaman admin.html
        $_SESSION['username'] = $user['username']; // Simpan sesi username
        header("Location: admin.html");
        exit();
    } else {
        // Jika login gagal, kembali ke halaman login dengan pesan error
        header("Location: login.html?login=failed");
        exit();
    }
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
