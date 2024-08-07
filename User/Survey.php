<?php session_start(); ?>
<!doctype html>
<html>

<head>
<title>Survey</title>
  <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="survey.css">
</head>
<style>
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
<body style="background:#FFFDF3;">
  <?php
  if($_SESSION['usertype_id']=="2"){
    include("MenuBar.php");
    echo "<div class=boxtop d-flex pt-5 pb-1 style='padding:40px; justify-content: center;  background-color: #F8DAD3;'>";
    echo "<h1 class=topic style='font-size: 50px; color: #F07028; font-weight: 500;' >Survey</h1>";
    echo "</div>";
    echo "<div id='content-container'>";
  $send = (isset($_POST['send']) ? $_POST['send'] : '');
  if ($send == '') {
  ?> 
<form method="post" action="" enctype="multipart/form-data">
    <div class="container" style="background:#fff; 
                      border-radius: 15px;  
                      box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">



  <div class="mb-5 mt-5 ml-5">
  <td>แนวเพลงที่ชอบ</td> <br>
    <label><input type="checkbox" name="music[]" value="inter"> สากล</label><br>
    <label><input type="checkbox" name="music[]" value="pop"> ป็อป</label><br>
    <label><input type="checkbox" name="music[]" value="acoustic"> อคูสติก</label><br>
    <label><input type="checkbox" name="music[]" value="country"> เพื่อชีวิต</label><br>
    <label><input type="checkbox" name="music[]" value="jazz"> แจ๊ส</label><br>
    <label><input type="checkbox" name="music[]" value="rock"> ร็อค</label><br>
    <label><input type="checkbox" name="music[]" value="rap"> แร็พ</label><br>
    <label><input type="checkbox" name="music[]" value="EDM"> EDM</label><br>
    <label><input type="checkbox" name="music[]" value="folk"> โฟล์คซอง</label><br>
    <label><input type="checkbox" name="music[]" value="live_music"> ดนตรีสด</label><br>
    <label><input type="checkbox" name="music[]" value="on_music"> เปิดเพลง</label><br>
    <label><input type="checkbox" name="music[]" value="indie"> อินดี้</label><br>
  </div>

  <div class="mb-5 ml-5">
    <td>ประเภทร้านที่ชอบ</td> <br>
    <label><input type="checkbox" name="type[]" value="pub"> ผับ</label><br>
    <label><input type="checkbox" name="type[]" value="bar"> บาร์</label><br>
    <label><input type="checkbox" name="type[]" value="indoor"> indoor</label><br>
    <label><input type="checkbox" name="type[]" value="outdoor"> outdoor</label><br>
    <label><input type="checkbox" name="type[]" value="cocktail_bar"> cocktail bar</label><br>
    <label><input type="checkbox" name="type[]" value="restaurant"> restaurant</label><br>
  </div>

  <div class=" ml-5">
    <td>สไตล์ร้านที่ชอบ</td> <br>
    <label><input type="checkbox" name="style[]" value="Vintage"> วินเทจ</label><br>
    <label><input type="checkbox" name="style[]" value="Minimal"> มินิมอล</label><br>
    <label><input type="checkbox" name="style[]" value="Modern"> โมเดิร์น</label><br>
    <label><input type="checkbox" name="style[]" value="Camp"> แคมป์</label><br>
    <label><input type="checkbox" name="style[]" value="Thai_Ban"> ไทบ้าน</label><br>
    <label><input type="checkbox" name="style[]" value="Luk_Thung"> ลูกทุ่ง</label><br>
  </div>

  <input class="button mt-4" type="submit" name="send" value="ยืนยัน" style="width: 15%; margin-left: 30%; background-color: #176B87;">
  <input class="button" type="reset" name="cancel" value="รีเซ็ต" style="width: 15%; margin-left: 2%;">
          <!-- <input class="button button1" type="reset" name="cancel" value="Reset"> -->
          </div>
</form>

<!--   <center class="boxtext  " >
    <p class="d-inline-flex mt-2 " style="padding-top: 0px; ">
    <a href="UserHome.php">
        <button type="button" class="btn btn-lg" style="border-radius: 15px;
        color: #FFF; padding: 10px 90px; padding-bottom: 10px;
        background: #176B87;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px
        rgba(0, 0, 0, 0.25) inset; ">submit</button>
        </a>
    </p>
</center> -->

<?php }else{

    $id = $_SESSION["user_id"];
    $survey_id = (isset($_GET['survey_id']) ? $_GET['survey_id'] : ''); 

    if(isset($_POST['music'])) {
      $music = $_POST['music'];
  
      // สร้างตัวแปรเพื่อเก็บค่าสำหรับแต่ละวัน
      $inter = in_array('inter', $music) ? 1 : 0;
      $pop = in_array('pop', $music) ? 1 : 0;
      $acoustic = in_array('acoustic', $music) ? 1 : 0;
      $country = in_array('country', $music) ? 1 : 0;
      $jazz = in_array('jazz', $music) ? 1 : 0;
      $rock = in_array('rock', $music) ? 1 : 0;
      $rap = in_array('rap', $music) ? 1 : 0;
      $EDM = in_array('EDM', $music) ? 1 : 0;
      $folk = in_array('folk', $music) ? 1 : 0;
      $live_music = in_array('live_music', $music) ? 1 : 0;
      $on_music = in_array('on_music', $music) ? 1 : 0;
      $indie = in_array('indie', $music) ? 1 : 0;
  }

  if(isset($_POST['type'])) {
    $type = $_POST['type'];

    // สร้างตัวแปรเพื่อเก็บค่าสำหรับแต่ละวัน
    $pub = in_array('pub', $type) ? 1 : 0;
    $bar = in_array('bar', $type) ? 1 : 0;
    $indoor = in_array('indoor', $type) ? 1 : 0;
    $outdoor = in_array('outdoor', $type) ? 1 : 0;
    $cocktail_bar = in_array('cocktail_bar', $type) ? 1 : 0;
    $restaurant = in_array('restaurant', $type) ? 1 : 0;
  }

  if(isset($_POST['style'])) {
    $style = $_POST['style'];

    // สร้างตัวแปรเพื่อเก็บค่าสำหรับแต่ละวัน
    $Vintage = in_array('Vintage', $style) ? 1 : 0;
    $Minimal = in_array('Minimal', $style) ? 1 : 0;
    $Modern = in_array('Modern', $style) ? 1 : 0;
    $Camp = in_array('Camp', $style) ? 1 : 0;
    $Thai_Ban = in_array('Thai_Ban', $style) ? 1 : 0;
    $Luk_Thung = in_array('Luk_Thung', $style) ? 1 : 0;
  }

  require("../ConfigDB.php");
  $sql = "USE zbvfpszw_group_recommen";
  $conn->query($sql);
    $user_id = $_SESSION["user_id"];
    $group_id = $_GET["group_id"];

  $sql = "INSERT INTO survey_item VALUES(null, $survey_id, $inter , $pop , $acoustic, $country, 
  $jazz, $rock, $rap, $EDM, $folk, $live_music, $on_music, $indie, $pub, $bar, $indoor, $outdoor,
  $cocktail_bar, $restaurant, $Vintage, $Minimal, $Modern, $Camp, $Thai_Ban, $Luk_Thung, $id);";

  $result = $conn->query($sql); 
  echo "<meta http-equiv=\"Refresh\" content=\"1; url=MainGroup.php?group_id=$group_id\">";
  }
}else
echo "<meta http-equiv=\"Refresh\" content=\"1; url=../Login.php\">";
?>
</body>
</html>