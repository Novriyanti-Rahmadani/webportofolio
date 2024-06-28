<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kontak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .card h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        form {
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table td:first-child {
            width: 120px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        textarea {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            height: 100px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Tambah Kontak</h2>
        <form action="proses_add_contact.php" method="POST">
            <table>
                <tr>
                    <td>Nama Lengkap:</td>
                    <td><input type="text" name="nama_lengkap" required></td>
                </tr>
                <tr>
                    <td>No. Telepon:</td>
                    <td><input type="tel" name="telepon" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Pesan:</td>
                    <td><textarea name="pesan" required></textarea></td>
                </tr>
            </table>
            <button type="submit">Tambah Kontak</button>
        </form>
    </div>
</body>
</html>
