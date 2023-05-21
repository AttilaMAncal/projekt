<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barber_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $time= $_POST['time'];
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $number = $_POST['number'];
    $message= $_POST['message'];

    $sql = "UPDATE barber SET name='$name', phone='$phone',time='$time', branch='$branch', date='$date', number='$number', message='$message', WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
