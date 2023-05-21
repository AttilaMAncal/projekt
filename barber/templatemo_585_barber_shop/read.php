<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barber_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM barber";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Phone: " . $row["phone"] . " - Time: " . $row["time"] . " - Branch: " . $row["branch"]. " - Date: " . $row["date"] . " - Number: " . $row["number"] . " - Message: " . $row["message"] . "<br>";
    }
} else {
    echo "No records found";
}

$conn->close();
?>
