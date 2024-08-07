<?php include ('../ConfigDB.php'); 
 

//สร้างตัวแปร
$user_id = $_GET['user_id'];
	//ลบข้อมูล
	$sql = "
    DELETE FROM groupmember WHERE user_id = '$user_id';
";

$result = mysqli_multi_query($conn, $sql);

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