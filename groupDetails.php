<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rental Group Details</title>
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
        form {
            margin-top: 20px;
        }
        form label, form input, form select, form button {
            display: block;
            margin: 10px 0;
            padding: 5px;
        }
        form input[type="submit"] {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
     
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class ="scrollbit container">
<?php
if (isset($_GET['code'])) {
    $groupCode = $_GET['code'];

    include 'connectdb.php';

    // Fetch group details
    $groupQuery = $connection->prepare("SELECT * FROM rentalGroup WHERE code = :code");
    $groupQuery->execute(['code' => $groupCode]);

    $group = $groupQuery->fetch();

    echo "<h2>Details for Group: " . $group['code'] . "</h2>";
   
    echo "<table>";
    echo "<tr><th>Group Code</th><td>" . $group['code'] . "</td></tr>";
    echo "<tr><th>Parking</th><td>" . $group['parking'] . "</td></tr>";
    echo "<tr><th>Accessibility</th><td>" . $group['access'] . "</td></tr>";
    echo "<tr><th>Laundry</th><td>" . $group['laundry'] . "</td></tr>";
    echo "<tr><th>Type</th><td>" . $group['type'] . "</td></tr>";
    echo "<tr><th>Beds</th><td>" . $group['beds'] . "</td></tr>";
    echo "<tr><th>Bath</th><td>" . $group['bath'] . "</td></tr>";
    echo "<tr><th>Cost</th><td>$" . $group['cost'] . "</td></tr>";
    echo "</table>";

$rentersQuery = $connection->prepare("SELECT fname, lname FROM renter WHERE rentalGroup = :code");
    $rentersQuery->execute(['code' => $groupCode]);



    echo "<h3>Students in this Group:</h3>";
    echo "<ul>";
    while ($renter = $rentersQuery->fetch()) {
        echo "<li>".$renter['fname']." ".$renter['lname']."</li>";
    }
    echo "</ul>";

    echo "<a href='groupDetails.php?code=$groupCode&edit=true'>Update Preferences</a>";

    if (isset($_GET['edit']) && $_GET['edit'] == 'true') {
        // Display the form for updating preferences
        echo "<form method='post'>";
        echo "<label for='parking'>Parking:</label>";
        echo "<select name='parking' id='parking'>";
        echo "<option value='Y'" . ($group['parking'] == 'Y' ? ' selected' : '') . ">Yes</option>";
        echo "<option value='N'" . ($group['parking'] == 'N' ? ' selected' : '') . ">No</option>";
        echo "</select><br>";

        echo "<label for='access'>Access:</label>";
        echo "<select name='access' id='access'>";
        echo "<option value='Y'" . ($group['access'] == 'Y' ? ' selected' : '') . ">Yes</option>";
        echo "<option value='N'" . ($group['access'] == 'N' ? ' selected' : '') . ">No</option>";
        echo "</select><br>";

        echo "<label for='laundry'>Laundry:</label>";
        echo "<select name='laundry' id='laundry'>";
        echo "<option value='Y'" . ($group['laundry'] == 'Y' ? ' selected' : '') . ">Yes</option>";
        echo "<option value='N'" . ($group['laundry'] == 'N' ? ' selected' : '') . ">No</option>";
        echo "</select><br>";
        
	echo "<label for='cost'>Max Cost:</label>";
        echo "<input type='number' id='cost' name='cost' value='" . $group['cost'] . "'><br>";

	echo "<label for='beds'>Beds:</label>";
        echo "<input type='number' id='beds' name='beds' value='" . $group['beds'] . "'><br>";
	
	echo "<label for='bath'>Bath:</label>";
        echo "<input type='number' id='bath' name='bath' value='" . $group['bath'] . "'><br>";


	echo "<label for='type'>Type:</label>";
        echo "<select name='type' id='type'>";
        echo "<option value='House'" . ($group['type'] == 'House' ? ' selected' : '') . ">House</option>";
        echo "<option value='Apartment'" . ($group['type'] == 'Apartment' ? ' selected' : '') . ">Apartment</option>";
        echo "<option value='Room'" . ($group['type'] == 'Room' ? ' selected' : '') . ">Room</option>";
        echo "</select><br>";

        echo "<input type='submit' value='Update Preferences'>";
        echo "</form>";
    }

    // Process the update if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $updateQuery = $connection->prepare("UPDATE rentalGroup SET parking = :parking, access = :access, laundry = :laundry, cost = :cost, beds = :beds, bath = :bath, type = :type WHERE code = :code");

        $updateQuery->execute([
            'parking' => $_POST['parking'],
            'access' => $_POST['access'],
            'laundry' => $_POST['laundry'],
	     'cost' => $_POST['cost'],
	     'beds' => $_POST['beds'],
	     'bath' => $_POST['bath'],
	     'type' => $_POST['type'],
            'code' => $groupCode
        ]);

          // Refresh to show updated details
        echo "<meta http-equiv='refresh' content='0;URL=groupDetails.php?code=$groupCode'>";

    }

    $connection = null;
} else {
    echo "No group selected.";
}
?>
</div>
</body>
</html>
