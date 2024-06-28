<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek Baru</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path CSS dengan lokasi file CSS Anda -->
    <style>
        /* Tambahkan CSS tambahan di sini sesuai kebutuhan */
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Proyek Baru</h1>

        <form action="proses_add_project.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Judul Proyek</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit">Tambah Proyek</button>
        </form>
    </div>
</body>
</html>
