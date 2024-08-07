<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Group</title>
  <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">

<link href="css/main.css" rel="stylesheet" type="text/css" />

<style>
    #map {
      height: 500px;
      width: 1000px;
      margin: 40px;
    }
  </style>
</head>

<style>
    input[type="text"] {
      background-color: #FFFFFF;
      color: #000000;
      font-size: 16px;
      margin-top: 5px;
      padding-bottom: 5px;
      padding-left: 5px;
      border-radius: 5px;
      cursor: pointer;
    }

    td {
        margin-bottom: 15px;
    }

        input[type="submit"] {
    background-color: #176B87;
    color: #fff;
    cursor: pointer;
    border-radius: 5px; /* ขอบมนสำหรับปุ่ม submit */
    border: none; /* ลบเส้นขอบ */
    margin-top: 10px;
    margin-bottom: 15px;
    padding: 8px 30px; /* ปรับขนาด padding เพื่อทำให้ปุ่มใหญ่ขึ้น */
    font-size: 16px; /* ปรับขนาดตัวอักษร */
    }

        input[type="reset"] {
    background-color: #828282;
    color: #fff;
    cursor: pointer;
    border-radius: 5px; /* ขอบมนสำหรับปุ่ม submit */
    border: none; /* ลบเส้นขอบ */
    margin-top: 10px;
    margin-bottom: 15px;
    padding: 8px 30px; /* ปรับขนาด padding เพื่อทำให้ปุ่มใหญ่ขึ้น */
    font-size: 16px; /* ปรับขนาดตัวอักษร */
}
  </style>

<body style="background: #FCE499;">
<?php
if($_SESSION['usertype_id']=="2"){
	include("MenuBar.php");
	echo "<div id='content-container'>";
$send = (isset($_POST['send']) ? $_POST['send'] : '');
if ($send == '') {
?>
	<form method="post" action="" enctype="multipart/form-data">
	<center> <p class="topic" style="  font-size: 30px; background:#2C2C2C; color: #fff; 
                                     padding-top: 2% ;  padding-bottom: 2% ; font-weight: 600;">สร้างกลุ่ม</p>
	
  <table class='insertstudents'>
		<tr><p class="namegroup mt-5" style="font-size: 20px;">กรุณาตั้งชื่อกลุ่ม</p><td>
    <input type="text" name="name" style="border: solid 1px; width:300px"></td></tr>
<?php
	require("../ConfigDB.php");

	$sql = "USE zbvfpszw_group_recommen";
	if(!$conn->query($sql))
?>		
			<td>
          <input class="button mt-5 " type="submit" name="send" value="บันทึก" style="background:#F07028;  width: 40%; margin-left:10%;">
     			<input class="button mt-2 ml-2" type="reset" name="cancel" value="รีเซ็ต" style="background:#7E7E7E; width: 40%;">
			</td>
</table>
</center>
</form>


<?php }else {
    
	$Gname = (isset($_POST['name']) ? $_POST['name'] : '');

require("../ConfigDB.php");
	$sql = "USE zbvfpszw_group_recommen";
	$conn->query($sql);
  $user_id = $_SESSION["user_id"];

$sql = "INSERT INTO `groups` VALUES(null, '$Gname',$user_id);";

echo "<center>";
	if ($conn->query($sql) === TRUE) {
    $sql = "SELECT group_id from `groups` where group_name = '$Gname';";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
      $data = $result->fetch_array();
      $_SESSION['group_id'] = $data['group_id']; 
      $group_id = $_SESSION["group_id"];
    
    $sql = "INSERT INTO `groupmember` VALUES(null,$group_id,$user_id);";
    $conn->query($sql) ;
  }
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
echo "</center>";

	$conn->close();

	////////////   content stop  //////////////////
	echo "</div>";

	echo "<meta http-equiv=\"Refresh\" content=\"1; url=UserHome.php\">";
}
}else
echo "<meta http-equiv=\"Refresh\" content=\"1; url=UserHome.php\">";
?>
<script>
    if ( window.history.replaceState ) {
	    window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>