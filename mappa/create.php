<?php
$servername="localhost";
$username="root";
$password="";
$database="barber_db";

$connection=new mysqli($servername, $username, $password, $database);

$name="";
$email="";
$phone="";
$time="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $time=$_POST["time"];

    do{
        if(empty($name)||empty($email)|| empty($phone)|| empty($time)){
            $errorMessage="All the fields are required";
            break;
        }

        $sql="INSERT INTO barber(name, email, phone, time)".
                "VALUES('$name', '$email', '$phone', '$time')";
        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="Invalid query: ".$connection->error;
            break;
        }

        $name="";
        $email="";
        $phone="";
        $time="";

        $successMessage="Client added correctly";

        header("location: /mappa/client.php");
        exit;

    }while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barber</title>
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
        <div class="col-10 mb-3">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" type="text" value="<?php echo $name; ?>"placeholder="Enter Name">
                </div>
                <div class="col-10 mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" type="text"value="<?php echo $email; ?>"  placeholder="Enter Email">
                </div>
                <div class="col-10 mb-3">
                    <label for="phone">Phone</label>
                    <input class="form-control" name="phone" type="text" value="<?php echo $phone; ?>" placeholder="Enter Phone Number">
                </div>
                <div class="col-10 mb-3">
                    <label for="time">Time</label>
                    <input class="form-control" name="time" type="text" value="<?php echo $time; ?>" placeholder="Enter Time">
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
                <a class="btn btn-danger btn-sm cancel" href="/mappa/client.php" role="button">Cancel</a>
            </div>
        </div>
    </div>
</form>
</body>
</html>