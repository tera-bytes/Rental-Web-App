<!-- navbar.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .header {
            background-color: #45a0c4;
            color: white;
            padding: 20px;
            text-align: center;
            background-size: cover;
            background-position: center;
        }
        .nav-bar {
            background-color: #333;
            overflow: hidden;
        }
        .nav-bar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .nav-bar a:hover {
            background-color: #ddd;
            color: black;
        }

        .category a {
            text-decoration: none;
            color: black;
        }
        .footer {
            background-color: #45a0c4;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<div class="header">
    <h1 >Rental Management System</h1>
</div>

<div class="nav-bar">
    <a href="rental.php">Rental Home</a>
    <a href="testing.php">Properties</a>
    <a href="groups.php">Rental Groups</a>
    <a href="rents.php">Average Rent</a>
</div>


<div class="footer">
    <p>&copy; 2024 Rental Management System</p>
</div>

</body>
</html>

