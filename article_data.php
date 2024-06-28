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

// Fungsi untuk menghapus artikel
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql_delete = "DELETE FROM artikel WHERE id = $delete_id";
    if ($conn->query($sql_delete) === TRUE) {
        echo '<div class="card">';
        echo '<p>Artikel berhasil dihapus.</p>';
        echo '</div>';
    } else {
        echo '<div class="card">';
        echo '<p>Error: ' . $sql_delete . '<br>' . $conn->error . '</p>';
        echo '</div>';
    }
}

// Query untuk mengambil data artikel
$sql = "SELECT * FROM artikel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nama Artikel</th>';
    echo '<th>Deskripsi</th>';
    echo '<th>Gambar</th>';
    echo '<th>Aksi</th>';
    echo '</tr>';

    // Output data dari setiap row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["nama_artikel"] . '</td>';
        echo '<td>' . $row["deskripsi"] . '</td>';
        echo '<td><img src="' . $row["gambar"] . '" alt="' . $row["nama_artikel"] . '" style="max-width: 100px;"></td>';
        echo '<td>';
        echo '<button class="edit-button" onclick="editArtikel(' . $row["id"] . ')">Edit</button>';
        echo '<form method="POST" style="display: inline;">';
        echo '<input type="hidden" name="delete_id" value="' . $row["id"] . '">';
        echo '<button type="submit" class="delete-button">Delete</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "Tidak ada artikel.";
}

// Tutup koneksi
$conn->close();
?>

<script>
    function editArtikel(id) {
        // Redirect ke halaman edit_artikel.php dengan mengirimkan parameter ID artikel
        window.location.href = 'edit_artikel.php?id=' + id;
    }
</script>
