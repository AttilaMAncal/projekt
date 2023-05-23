<?php
$servername="localhost";
$username="root";
$password="";
$database="barber_db";

$connection=new mysqli($servername, $username, $password, $database);

$id="";
$name="";
$email="";
$phone="";
$time="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){

    if(!isset($_GET["id"])){
        header("location: /mappa/client.php");
        exit;
    }
    $id=$_GET["id"];

    $sql="SELECT*FROM barber WHERE id=$id";
    $result=$connection->query($sql);
    $row=$result->fetch_assoc();

    if(!$row){
        header("location: /mappa/client.php");
        exit;
    }

    $name=$row["name"];
    $email=$row["email"];
    $phone=$row["phone"];
    $time=$row["time"];

}
else{

    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $time=$_POST["time"];

    do{
        if(empty($id)|| empty($name)|| empty($email)|| empty($phone)|| empty($time)){
            $errorMessage="All the fields are required";
            break;
        }

        $sql="UPDATE barber ".
                "SET name='$name', email='$email', phone='$phone', time='$time'".
                "WHERE id=$id";
        
        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="Invalid query".$connection->error;
            break;
        }

        $successMessage="Client updated correctly";

        header("location: /mappa/edit.php");
        exit;

    }while(true);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="color: white; background-color: #1d2630">
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-5 mb-5"><strong>New Client</strong><h1>
        </div>
        <div class="main row justify-contact-center">


        <?php
        if(!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post" action="" id="student-form" class="row justify-content-center mb-4">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="col-10 mb-3">
                <label for="name">Name</label>
                <input class="form-control" name="name" type="text" value="<?php echo $name; ?>"placeholder="Enter Name">
            </div>
            
        
            <div class="col-10 mb-3">
                <label for="email">Email</label>
                <input class="form-control" name="email" type="text"value="<?php echo $email; ?>"  placeholder="Enter Email">
            </div>
    
            <div class="col-10 mb-3">
                <label for="email">Email</label>
                <input class="form-control" name="phone" type="text"value="<?php echo $phone; ?>"  placeholder="Enter Email">
            </div>
    
            <div class="col-10 mb-3">
                <label for="email">Email</label>
                <input class="form-control" name="time" type="text"value="<?php echo $time; ?>"  placeholder="Enter Email">
            </div>
    

    <?php
    if(!empty($successMessage)){
        echo"
        <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        </div>
    </div>
    ";
    
    }
    ?>
    <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/mappa/client.php" role="button">Cancel</a>
            </div>
        </div>
    </div>
</form>
</body>
</html>