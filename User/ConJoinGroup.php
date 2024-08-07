<?php session_start(); ?>
<?php 
 

//สร้างตัวแปร
$group_id = $_GET['group'];
$user_id = $_SESSION['user_id'];

include ('../ConfigDB.php'); 
  
      $sql = "INSERT INTO groupmember  VALUES(null,$group_id,$user_id)";

      $result = $conn->query($sql);
      $conn->query($sql) ;

// ปิดการเชื่อมต่อ database
mysqli_close($conn);

// ถ้าสำเร็จให้ redirect ไปยัง EntHome.php
if ($result) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'UserHome.php';";
    echo "</script>";
} else {
    // ถ้าไม่สำเร็จให้แสดงข้อความแจ้งเตือน
    echo "<script type='text/javascript'>";
    echo "alert('Error!');";
    echo "window.location = 'UserHome.php';";
    echo "</script>";
}
?>