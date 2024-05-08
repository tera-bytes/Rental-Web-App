<!DOCTYPE html>
<html>
<head>
    <style>
		.scrollbit{
	height: 500px;
	max-height: 50%;
	overflow-y: scroll;
	margin-left: 30px;
	margin-right: 30px;
}
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
       .scrollbit{
	height: 500px;
	max-height: 50%;
	overflow-y: scroll;
}
.container{
	margin-left: 30px;
	margin-right: 30px;}
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class = "scrollbit container">
<h2>Average Monthly Rent by Category</h2>

<table>
    <tr>
        <th>Houses</th>
        <th>Apartments</th>
        <th>Rooms</th>
    </tr>
    <tr>
        <?php
        include 'connectdb.php';

        $types = ['House', 'Apartment', 'Room'];
        $averages = [];

        foreach ($types as $type) {
            $query = $connection->prepare("SELECT AVG(cost) AS AverageRent FROM property WHERE type = :type");
            $query->bindParam(':type', $type);
            $query->execute();
            $result = $query->fetch();
            $averages[$type] = $result ? number_format($result['AverageRent'], 2) : 'N/A';
        }
        
        echo "<td>".$averages['House']."</td>";
        echo "<td>".$averages['Apartment']."</td>";
        echo "<td>".$averages['Room']."</td>";

        $connection = null;
        ?>
    </tr>
</table>
</div>
</body>
</html>
