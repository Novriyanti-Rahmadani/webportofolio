<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add or Edit Article
if (isset($_POST['submit'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nama_artikel = $_POST['nama_artikel'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];

    if ($id) {
        // Update existing article
        $sql = "UPDATE artikel SET nama_artikel='$nama_artikel', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id";
    } else {
        // Insert new article
        $sql = "INSERT INTO artikel (nama_artikel, deskripsi, gambar) VALUES ('$nama_artikel', '$deskripsi', '$gambar')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Article saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Article
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql_delete = "DELETE FROM artikel WHERE id = $delete_id";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Article deleted successfully";
    } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add/Edit Artikel</title>
    <link rel="stylesheet" href="path_to_your_css_file.css">
</head>
<body>
    <form action="add_artikel.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <label for="nama_artikel">Nama Artikel:</label>
        <input type="text" id="nama_artikel" name="nama_artikel" value="<?php echo isset($_GET['nama_artikel']) ? $_GET['nama_artikel'] : ''; ?>" required>
        <br>
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" required><?php echo isset($_GET['deskripsi']) ? $_GET['deskripsi'] : ''; ?></textarea>
        <br>
        <label for="gambar">Gambar URL:</label>
        <input type="text" id="gambar" name="gambar" value="<?php echo isset($_GET['gambar']) ? $_GET['gambar'] : ''; ?>" required>
        <br>
        <button type="submit" name="submit">Save</button>
    </form>

    <form action="add_artikel.php" method="POST">
        <label for="delete_id">ID Artikel untuk dihapus:</label>
        <input type="number" id="delete_id" name="delete_id" required>
        <button type="submit">Delete</button>
    </form>
</body>
</html>
