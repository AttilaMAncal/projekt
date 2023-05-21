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
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $time= $_POST['time'];
    $branch = $_POST['branch'];
    $date = $_POST['date'];
    $number = $_POST['number'];
    $message= $_POST['message'];

    $sql = "INSERT INTO barber(name, phone, time, branch, date, number, message) VALUES ('$name','$phone','$time','$branch','$date','$number','$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
