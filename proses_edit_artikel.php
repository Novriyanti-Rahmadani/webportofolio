<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
</head>
<body>
    <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = ""; // Sesuaikan dengan password database Anda
    $dbname = "admin";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data dari form edit artikel
    $artikel_id = $_POST['artikel_id'];
    $nama_artikel = $_POST['nama_artikel'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $temp_file = $_FILES['gambar']['tmp_name'];
    $upload_dir = 'uploads/'; // Direktori tempat menyimpan gambar

    // Query untuk mengupdate data artikel
    $sql = "UPDATE artikel SET nama_artikel=?, deskripsi=?";

    // Tambahkan kolom gambar ke dalam query jika ada perubahan gambar
    if ($gambar) {
        $sql .= ", gambar=?";
    }

    $sql .= " WHERE id=?";

    // Persiapkan statement
    $stmt = $conn->prepare($sql);

    // Periksa persiapan statement
    if ($stmt === false) {
        die("Prepare statement error: " . $conn->error);
    }

    // Bind parameter berdasarkan apakah ada perubahan gambar atau tidak
    if ($gambar) {
        // Pindahkan file gambar yang diupload ke direktori yang ditentukan
        $new_file = $upload_dir . $gambar;
        if (move_uploaded_file($temp_file, $new_file)) {
            // Bind parameter termasuk gambar
            $stmt->bind_param("sssi", $nama_artikel, $deskripsi, $gambar, $artikel_id);
        } else {
            echo "Gagal mengupload gambar.";
            exit;
        }
    } else {
        // Bind parameter tanpa gambar
        $stmt->bind_param("ssi", $nama_artikel, $deskripsi, $artikel_id);
    }

    // Eksekusi statement
    if ($stmt->execute()) {
        echo "Artikel berhasil diupdate.";
    } else {
        echo "Error dalam melakukan update artikel: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
