<!DOCTYPE html>
<html>
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
<body>
<?php include 'navbar.php'; ?>

<div class = "scrollbit container">
<h2>Properties</h2>

<table>
    <tr>
        <th>Property ID</th>
        <th>Owner Name</th>
        <th>Manager Name</th>
    </tr>

    <?php
    include 'connectdb.php';
    
    $query = "SELECT p.code AS PropertyID, CONCAT(o.fname, ' ', o.lname) AS OwnerName, CONCAT(m.fname, ' ', m.lname) AS ManagerName
              FROM property p 
              JOIN ownsProperty op ON p.code = op.propertyID 
              JOIN owner o ON op.ownerID = o.ID
	      LEFT JOIN manager m ON p.managerID = m.ID";

    $result = $connection->query($query);
    
    while ($row = $result->fetch()) {
        echo "<tr>
                <td>".$row["PropertyID"]."</td>
                <td>".$row["OwnerName"]."</td>
                <td>".$row["ManagerName"]."</td>
              </tr>";
    }
    
    $connection = null;
    ?>
</table>

</div>
 </body>
</html>