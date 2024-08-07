<?php session_start(); ?>
<!doctype html>
<html>

<head>
<title>Create Survey</title>
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

<body style="background:#FFFDF3;">
  <?php
  if($_SESSION['usertype_id']=="2"){
    $id = $_SESSION["user_id"];
    $group_id = (isset($_GET['group_id']) ? $_GET['group_id'] : ''); 

  require("../ConfigDB.php");
  $sql = "USE zbvfpszw_group_recommen";
  $conn->query($sql);
    $user_id = $_SESSION["user_id"];

  $sql = "INSERT INTO survey VALUES(null, '$group_id', '$id');";

 if($result = $conn->query($sql))  {
    echo "<center class=mt-5>สร้างแบบสอบถามสำเร็จ!</center>";
    echo "<meta http-equiv=\"Refresh\" content=\"1; url=MainGroup.php?group_id=$group_id\">";
 }

  }

?>
</body>
</html>