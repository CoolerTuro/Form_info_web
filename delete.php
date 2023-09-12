<?php
    $servername = "localhost";
    $username = "prach";
    $password = "abc123";
    $dbname = "lab1";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection Fail" . $conn->connect_error);
    }else{echo "Connection success";}



    
    $id = $_GET['id'];
    $stmt= $conn -> prepare("DELETE FROM customer WHERE id=?");           //เตรียมคำสั่ง SQL สำหรับการลบข้อมูลในตาราง customer โดยใช้เงื่อนไข id เป็นตัวกำหนดในการลบ.
    $stmt->bind_param("i",$id);                                         //ผูกค่าของ id เข้ากับคำสั่ง SQL เพื่อป้องกัน SQL injection และเตรียมคำสั่ง SQL 
    
    if($stmt){

        if($stmt->execute()){
            
            echo "<script> window.location = 'added.php'; </script>";
        }
        $stmt->close();                                                 //ปิดคำสั่ง SQL เมื่อไม่ได้ใช้งาน.
    }
    else{
        echo "Eror Prepare Statement". $conn->error;
    }
    mysqli_close($conn);                                                //ปิดการเชื่อมต่อฐานข้อมูล.
    header("Location: added.php");
    exit();


?>