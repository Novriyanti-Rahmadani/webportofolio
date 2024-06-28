<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Adjust CSS file path as needed -->
    <style>
        /* Add additional CSS here as needed */
        .navbar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            overflow-y: auto;
        }

        .navbar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            margin-bottom: 10px;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        .content {
            margin-left: 220px; /* Adjust with sidebar width */
            padding: 20px;
        }

        .card {
            background: #f4f4f4;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-button, .delete-button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .edit-button {
            background-color: #4caf50;
            color: white;
            margin-right: 5px;
        }

        .delete-button {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#dashboard">Dashboard</a>
        <a href="#artikel">Artikel</a>
        <a href="#skills">Skill</a>
        <a href="#projects">Project</a>
        <a href="#experience">Experience</a>
        <a href="#contact">Kontak</a>
    </div>

    <div class="content">
        <h1>Daftar Skill</h1>

        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "admin";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Function to delete skill
        if (isset($_POST['delete_id'])) {
            $delete_id = $_POST['delete_id'];
            $sql_delete = "DELETE FROM skill WHERE id = $delete_id";
            if ($conn->query($sql_delete) === TRUE) {
                echo '<div class="card">';
                echo '<p>Skill berhasil dihapus.</p>';
                echo '</div>';
            } else {
                echo '<div class="card">';
                echo '<p>Error: ' . $sql_delete . '<br>' . $conn->error . '</p>';
                echo '</div>';
            }
        }

        // Query to fetch skill data
        $sql = "SELECT * FROM skill";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nama Skill</th>';
            echo '<th>Range</th>';
            echo '<th>Aksi</th>';
            echo '</tr>';

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["Nama_skill"] . '</td>';
                echo '<td>' . $row["Range"] . '</td>';
                echo '<td>';
                echo '<button class="edit-button" onclick="editSkill(' . $row["id"] . ')">Edit</button>';
                echo '<form method="POST" style="display: inline;">';
                echo '<input type="hidden" name="delete_id" value="' . $row["id"] . '">';
                echo '<button type="submit" class="delete-button">Delete</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo "No skills found.";
        }

        // Close connection
        $conn->close();
        ?>

        <!-- JavaScript for edit action -->
        <script>
            function editSkill(id) {
                // Redirect to edit_skill.php with ID parameter
                window.location.href = 'edit_skill.php?id=' + id;
            }
        </script>
    </div>
</body>
</html>
