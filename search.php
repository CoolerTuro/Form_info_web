<?php

$servername = "localhost";
$username = "prach";
$password = "abc123";
$dbname = "lab1";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection Fail" . $conn->connect_error);
}else{echo "Connection success";}


$emp = $_POST["emp"];

$sql = "SELECT * FROM customer WHERE name LIKE '%$emp%' OR last_name LIKE '%$emp%' OR nick_name LIKE '%$emp%' OR phone LIKE '%$emp%' ORDER BY name ASC ";
$result = $conn->query($sql);

$count = mysqli_num_rows($result);
$order = 1;


?>
<br>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>Customer List</title>
    
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <div class="row">
    <div class="col-8">
      <a href="form.php" class="btn btn-primary">Add New Form</a>
    </div>
    
      <div class="col-4 text-right">
      <form action="search.php" class="form-group my-3" method="POST">
        <div class="input-group">
          <input type="text" placeholder="" class="form-control" name="emp" required>
          <div class="input-group-append">
            <input type="submit" value="Search" class="btn btn-info">
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<br><h2 >Customer List</h2> <br><br><br><br><br>


    <div class="container">
        
        <div class="row">
            <?php
            

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-10 mb-3">';

                    echo '<div class="login-card">';

                    echo '<img src="' . $row["photo"] . '" class="card-img-top" alt="Customer Photo">';


                    echo '<div class="card-body">';
                    echo '<h3 class="card-title">' . $row["name"] . ' ' . $row["last_name"] . '</h5>';
                    echo '<p class="card-text">Nickname: ' . $row["nick_name"] . '</p>';
                    echo '<p class="card-text">Email: ' . $row["email"] . '</p>';
                    echo '<p class="card-text">Phone: ' . $row["phone"] . '</p>';

                    
                    echo '<a href="edit.php?id=' . $row["id"] . '" class="btn btn-success"> เเก้ไข</a>';
                    echo '<a href="delete.php?id=' . $row["id"] . '" class="btn btn-danger" onclick="return confirm(\'Confirm data deletion\')">ลบ</a>';

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No customers found.";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

