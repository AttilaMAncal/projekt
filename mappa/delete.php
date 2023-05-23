<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];

    $servername="localhost";
    $username="root";
    $password="";
    $database="barber_db";
    
    $connection=new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM barber WHERE id=$id";
    $connection->query($sql);
}
header("location: /mappa/client.php");
exit;
?>