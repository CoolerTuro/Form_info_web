
<?php
    $servername = "localhost";
    $username = "prach";
    $password = "abc123";
    $dbname = "lab1";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection Fail" . $conn->connect_error);
    }else{echo "Connection success";}

    $id = $_GET["id"];

    $sql = "SELECT * FROM customer WHERE id=$id";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Update</title>
</head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    

    <div class="container">
        <div class="login-card">
            <h2>Customer</h2> 
            <form action="updation.php" method="POST">
                <input type="hidden" value="<?php echo $row["id"]; ?>" name="id">

                <input type="text" name="name" placeholder="First Name" required     value="<?php echo $row["name"]; ?>">
                <input type="text" name="last_name" placeholder="Last Name" required value="<?php echo $row["last_name"]; ?>">
                <input type="text" name="nick_name" placeholder="Nick Name" required value="<?php echo $row["nick_name"]; ?>">
                <input type="email" name="email" placeholder="Email" required        value="<?php echo $row["email"]; ?>">
                <input type="tel" name="phone" placeholder="Phone Number" required   value="<?php echo $row["phone"]; ?>">
                <input type="url" name="photo" placeholder="Photo URL" required     value="<?php echo $row["photo"]; ?>">
                
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    </body>
</html>