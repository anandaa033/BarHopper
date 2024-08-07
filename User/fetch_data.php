<?php
include "../ConfigDB.php";

$group_id = $_GET['group_id'];
// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// สร้างคำสั่ง SQL เพื่อดึงข้อมูล
$sql = "SELECT m.groupmember_id, m.group_id, m.user_id, u.user_name 
FROM `groupmember` m 
INNER JOIN user u ON m.user_id = u.user_id
WHERE m.group_id = $group_id 
AND (m.user_id, m.groupmember_id) IN 
  ( SELECT user_id, MAX(groupmember_id)
    FROM `groupmember`
    WHERE group_id = $group_id
    GROUP BY user_id)
ORDER BY m.user_id DESC;";

$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($result->num_rows > 0) {
    // แสดงข้อมูลในรูปแบบ JSON
    $output = array();
    while($row = $result->fetch_assoc()) {
        $output[] = $row;
    }
    echo json_encode($output);
} else {
    echo json_encode(array()); // ส่ง JSON เปล่าๆ เมื่อไม่มีข้อมูล
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
