<?php session_start(); ?>
<?php
// รับข้อมูลที่ส่งมาจาก AJAX
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];

// ตรวจสอบความถูกต้องของข้อมูล (ตรวจสอบค่าว่าง, ความปลอดภัย, ฯลฯ)

// เชื่อมต่อฐานข้อมูล
require("ConfigDB.php");
$sql = "USE zbvfpszw_group_recommen";
$conn->query($sql);

// เตรียมคำสั่ง SQL ด้วย Prepared Statements
$sql = "INSERT INTO user VALUES(null, '$username', $usertype, '$email', '$password')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $username, $usertype, $email, $password);

// ประมวลผลคำสั่ง SQL
if ($stmt->execute()) {
    echo "New record created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
}

// ปิด Prepared Statements
$stmt->close();

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
