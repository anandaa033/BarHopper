<?php include ('../ConfigDB.php'); 
 

//สร้างตัวแปร
$ent_id = $_GET['ent_id'];
	//ลบข้อมูล
	$sql = "
    DELETE FROM entdrink WHERE Ent_id = '$ent_id';
    DELETE FROM entmusic WHERE Ent_id = '$ent_id';
    DELETE FROM entertainment WHERE Ent_id = '$ent_id';
    DELETE FROM entimg WHERE Ent_id = '$ent_id';
    DELETE FROM entstyle WHERE Ent_id = '$ent_id';
    DELETE FROM enttype WHERE Ent_id = '$ent_id';
";

$result = mysqli_multi_query($conn, $sql);

// ปิดการเชื่อมต่อ database
mysqli_close($conn);

// ถ้าสำเร็จให้ redirect ไปยัง EntHome.php
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
    echo "window.location = 'EntHome.php';";
    echo "</script>";
} else {
    // ถ้าไม่สำเร็จให้แสดงข้อความแจ้งเตือน
    echo "<script type='text/javascript'>";
    echo "alert('เกิดข้อผิดพลาดในการลบข้อมูล');";
    echo "window.location = 'EntHome.php';";
    echo "</script>";
}
?>