<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body style="color: white; background-color: #d6a354">
    <div class="row mb-3">
        <a style="color: white; background-color: #1d2630" class="btn btn-success add bt" href="/mappa/index.php" role="button">Home</a>
    </div>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a style="color: white; background-color: #1d2630" class="btn btn-primary" href="/mappa/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>    
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="barber_db";

                $connection= new mysqli($servername,$username, $password, $database);

                if($connection->connect_error){
                    die("Connection failed: ".$connection->connect_error);

                }
                $sql="SELECT * FROM barber";
                $result=$connection->query($sql);

                if(!$result){
                    die("Invalid query: ".$connection->error);
                }
                while($row=$result->fetch_assoc()){
                    echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[time]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/mappa/edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/mappa/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";

                          
                }
                ?>
            </tbody>
        </table>
        </div>
</body>
</html>