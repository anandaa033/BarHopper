<?php
include "../ConfigDB.php";

if(isset($_GET['survey_id'])) {
    // ดึงค่า $survey_id จาก URL
    $survey_id = $_GET['survey_id'];

    // ทำสิ่งที่ต้องการกับค่า $survey_id ที่ได้รับ เช่น การค้นหาข้อมูลจากฐานข้อมูล
    // ตัวอย่าง:
    // $survey_id = $_GET['survey_id'];
    // $result = คำสั่ง SQL ที่ใช้ในการค้นหาข้อมูลโดยใช้ $survey_id;

    $sql ="SELECT m.Ent_id, COUNT(r.rank_id) AS rank_count
    FROM `rank` r 
    INNER JOIN `entertainment` m ON m.Ent_id = r.Ent_id
    WHERE r.survey_id = $survey_id
    GROUP BY m.Ent_id
    ORDER BY m.Ent_id;";
    $result = mysqli_query($conn, $sql);
    $i = 1;
    $Ent_ids = []; // เก็บรหัสร้านที่ได้จากการรีวิว

    while($row = mysqli_fetch_array($result)) {
        $Ent_ids[] = $row['Ent_id'];
    }

    // ดึงข้อมูลหมุดจากฐานข้อมูล
    $sql = "SELECT * FROM `entertainment` WHERE Ent_id IN (" . implode(",", $Ent_ids) . ")";
    $result = mysqli_query($conn, $sql);

    $markers = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $markers[] = $row;
        }
    }

    // ส่งข้อมูลเป็น JSON
    header('Content-Type: application/json');
    echo json_encode($markers);
} else {
    // ถ้าไม่มีค่า $survey_id ถูกส่งมา สามารถทำการจัดการตามที่คุณต้องการได้
    echo "ไม่ได้รับค่า survey_id";
}

$conn->close();
?>
