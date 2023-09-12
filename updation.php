<?php
    $servername = "localhost";
    $username = "prach";
    $password = "abc123";
    $dbname = "lab1";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection Fail" . $conn->connect_error);
    }else{echo "Connection success";}
    
    $name = $_POST["name"];                         
    $last_name = $_POST["last_name"];
    $nick_name = $_POST["nick_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $photo = $_POST["photo"];
    $id = $_POST['id'];

                                      
    
    $sql =  "UPDATE customer
            SET name = ?,last_name = ?,nick_name = ?,email = ?,phone = ?,photo = ?
            WHERE id = $id; ";                                                                       //อัพเดทข้อมูลใน customer
    $stmt = $conn->prepare($sql);                                                           //เตรียมคำสั่ง SQL เพื่อนำไป execute ภายหลัง
    $stmt->bind_param("ssssss",$name, $last_name, $nick_name, $email, $phone, $photo);           //ผูกพารามิเตอร์ในคำสั่ง SQL 
    $stmt->execute();
    
    mysqli_close($conn);
    header("Location: added.php");
    exit();

?>