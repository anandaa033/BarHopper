
<?php include("EntMenuBar.php"); ?>

<!-- <?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
?> -->

<?php include ('../ConfigDB.php'); 

//สร้างตัวแปร
$ent_id = $_POST['ent_id'];
$ent_name = $_POST['ent_name'];
$ent_style = $_POST['ent_style'];
$ent_music = $_POST['ent_music'];
$ent_type = $_POST['ent_type'];
$ent_style = $_POST['ent_style'];
$ent_address = $_POST['ent_address'];
$ent_location = $_POST['ent_location'];



//แก้ไขข้อมูล
	$sql = " UPDATE entertainment SET
	ent_name = '$ent_name', ent_style = '$ent_style', 
	ent_music = '$ent_music', ent_address = '$ent_address', 
	ent_location ='$ent_location'
	WHERE ent_id = '$ent_id' ";
	
	$result = mysqli_query($conn, $sql);

//ปิดการเชื่อมต่อ database
mysqli_close($conn);
//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
echo "<script type='text/javascript'>";
  echo"alert('Edit Success');";
echo"window.location = 'EntEdit.php?ent_id=$ent_id';";
echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"window.location = 'EntInsert.php'; ";
echo"</script>";
}
?>