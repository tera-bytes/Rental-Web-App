<?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=rentaldb', "root", "");
} catch (PDOException $e) {
    echo "Error!: ". $e->getMessage(). "<br/>";
	die();
}
?>