<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental Group Listings</title>
    <style>
		.scrollbit{
	height: 500px;
	max-height: 50%;
	overflow-y: scroll;
}
.container{
	margin-left: 30px;
	margin-right: 30px;}
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class ="scrollbit container">

<h2>Rental Group Listings</h2>

<table>
    <tr>
        <th>Group Code</th>
        <th>Parking</th>
        <th>Access</th>
        <th>Laundry</th>
        <th>Type</th>
        <th>Beds</th>
        <th>Bath</th>
        <th>Cost</th>
        <th>Action</th>
    </tr>

    <?php
    include 'connectdb.php';

    $result = $connection->query("SELECT * FROM rentalGroup");

    while ($row = $result->fetch()) {
        echo "<tr>
                <td>".$row["code"]."</td>
                <td>".$row["parking"]."</td>
                <td>".$row["access"]."</td>
                <td>".$row["laundry"]."</td>
                <td>".$row["type"]."</td>
                <td>".$row["beds"]."</td>
                <td>".$row["bath"]."</td>
                <td>".$row["cost"]."</td>
                <td><a href='groupDetails.php?code=".$row["code"]."'>View Details</a></td>
              </tr>";
    }

    $connection = null;
    ?>
</table>
</div>
</body>
</html>
