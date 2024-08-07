<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Member</title>
  <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสมาชิก</title>
</head>


<link href="css/main.css" rel="stylesheet" type="text/css" />

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
	<center> <p class="topic " style=" font-size: 30px; background:#2C2C2C; color: #fff; 
                                     padding-top: 2% ;  padding-bottom: 2% ; font-weight: 600;">เพิ่มสมาชิก</p>

	<table class='insertstudents'>
		 <tr ><p class="namegroup mt-5" style="font-size: 20px;">กรุณากรอกชื่อผู้ใช้</p></tr>
    <td><input type="text" name="name" style="border: solid 1px; width:400px"></td></tr>

<?php
	require("../ConfigDB.php");

	$sql = "USE zbvfpszw_group_recommen";
	if(!$conn->query($sql))
?>		
			<td>
        <input class="button mt-5 " type="submit" name="send" value="ค้นหา" style="background:#F07028;  width: 40%; margin-left:10%;">
     		<input class="button mt-5 ml-2" type="reset" name="cancel" value="รีเซ็ต" style="background:#7E7E7E; width: 40%;">
			</td>
</table>
</center>
</form>


<?php }else {
    
	$name = (isset($_POST['name']) ? $_POST['name'] : '');

    require("../ConfigDB.php");
	$sql = "USE zbvfpszw_group_recommen";
	$conn->query($sql);
    $group_id = $_SESSION["group_id"];

    $sql = "SELECT * FROM `user` WHERE user_name LIKE '%$name%' AND usertype_id = 2;";
    $result = mysqli_query($conn, $sql);

  
    if (mysqli_num_rows($result) > 0) {
      ?>
      <form method="post" action="" enctype="multipart/form-data">
      <center>
          <p class="topic " style=" font-size: 30px; background:#2C2C2C; color: #fff; padding-top: 2% ;  padding-bottom: 2% ; font-weight: 600;">เข้าร่วมกลุ่ม</p>
  
          <table class='insertstudents mb-5' >
              <tr>
                  <p class="namegroup mt-5" style="font-size: 20px;">กรุณากรอกชื่อผู้ใช้</p>
              </tr>
              <tr>
                  <td><input type="text" name="name" style="border: solid 1px; width:400px"></td>
              </tr>
              <td>
          <input class="button mt-5 " type="submit" name="send" value="ค้นหา" style="background:#F07028;  width: 40%; margin-left:10%;">
          <input class="button mt-5 ml-2" type="reset" name="cancel" value="รีเซ็ต" style="background:#7E7E7E; width: 40%;">
              </td>
  </table>
  </center>
              <?php
              while ($row = mysqli_fetch_array($result)) {
              ?>
                  <div class="row mb-2" style="border: 1px solid; border-radius: 5px; width:40%; margin: auto; border: 0px solid #000; background: #FFF; box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25); padding:5px">
                    
                          <div class="col-6" style="padding:inherit; padding-left:20px; font-size:20px; ">
                              <?php echo $row['user_name']; ?>
                          </div>
                      <div class="col-6" style="margin:auto;  text-align: right;">
                      <?php $user_id = $row['user_id'];?>
                          <a href='ConAddMember.php?group=<?php echo $group_id;?> && user_id=<?php echo $user_id;?>'>
                              <button type="button" class="btn btn-success" style=" width:80px; font-size:15px;">
                                  เพิ่ม
                              </button>
                          </a>
                      </div>
                  </div>
              <?php
              }
              ?>
          </table>
      
  <?php
  } else { ?>
      <form method="post" action="" enctype="multipart/form-data">
      <center>
          <p class="topic " style=" font-size: 30px; background:#2C2C2C; color: #fff; padding-top: 2% ;  padding-bottom: 2% ; font-weight: 600;">เข้าร่วมกลุ่ม</p>
  
          <table class='insertstudents  mb-5'>
              <tr>
                  <p class="namegroup mt-5" style="font-size: 20px;">กรุณากรอกชื่อผู้ใช้</p>
              </tr>
              <tr>
                  <td><input type="text" name="name" style="border: solid 1px; width:400px"></td>
              </tr>
              <td>
          <input class="button mt-5 " type="submit" name="send" value="ค้นหา" style="background:#F07028;  width: 40%; margin-left:10%;">
               <input class="button mt-5 ml-2" type="reset" name="cancel" value="รีเซ็ต" style="background:#7E7E7E; width: 40%;">
              </td>
  </table>
  </center>
  <?php  
      echo "<div style='text-align: center;'>ไม่พบผู้ใช้</div>";
  }

	$conn->close();

	////////////   content stop  //////////////////
	echo "</div>";
}
}else
echo "<meta http-equiv=\"Refresh\" content=\"1; url=../Login.php\">";
?>
<script>
    if ( window.history.replaceState ) {
	    window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>