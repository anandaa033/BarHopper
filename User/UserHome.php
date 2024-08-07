<?php session_start(); ?>
<!doctype html>
<html>

<head>
<title>Home</title>
    <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<style>
.testclass {
  background-image: url("../img/Ent.png");
  position:sticky;
}

</style>
</head>
<body style="background-color:#FDF8F4;">
    <?php
    if($_SESSION['usertype_id']=="2"){
    include("MenuBar.php");

  require("../ConfigDB.php");
  $sql = "USE zbvfpszw_group_recommen";
  $conn->query($sql);
  $id = $_SESSION["user_id"];
  $query = "SELECT m.group_id, MAX(m.groupmember_id) AS groupmember_id, MAX(g.user_id) AS user_id, MAX(g.group_name) AS group_name 
  FROM groupmember m 
  INNER JOIN user u ON m.user_id = u.user_id
  INNER JOIN `groups` g ON m.group_id = g.group_id
  WHERE u.user_id = $id
  GROUP BY m.group_id
  ORDER BY m.group_id DESC;"; 
  //ประกาศตัวแปร sqli
  
  $result = mysqli_query($conn, $query);
    ?>
    
    <div class="mb-1">
        <img class="testclass" style="width: 100%; height: 300px; background-size:cover;">
    </div>
      
        <p class="d-inline-flex gap-5 ">
          <input name="group_id" type="hidden" id="group_id" value="<?php echo $row['group_id'];?>" /></td>
            <a href="InsertGroup.php?group_id=<?php echo $row['group_id']; ?>">
        <center>

        <a style="color: #FFF;" href="InsertGroup.php">
        <button type="button" class="btn btn-lg" style="width:300px; border-radius: 15px;
            color:#fff; padding: 15px 40px; padding-bottom: 20px; font-size:25px;
            background: #2C2C2C; float: right; margin:0 70px 50px 0;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px
            rgba(0, 0, 0, 0.25) inset; ">สร้างกลุ่ม</button></a>
        </center>

                
        <input name="group_id" type="hidden" id="group_id" value="<?php echo $row['group_id'];?>" /></td>
                    <a href="InsertGroup.php?group_id=<?php echo $row['group_id']; ?>">
        <center>
        <a style="color: #FFF;" href="JoinGroup.php">
        <button type="button" class="btn btn-lg" style="width:300px; border-radius: 15px;
            color:#fff; padding: 15px 40px; padding-bottom: 20px; font-size:25px;
            background: #2C2C2C; float: right; margin:0 70px 50px 0;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px
            rgba(0, 0, 0, 0.25) inset; ">เข้าร่วมกลุ่ม</button></a>
        </center>
        </p>
        <p style="padding: 80px 0 30px 0 ; margin: auto; width: 90%; font-size:40px;">My Group</p>

<?php
 while($row = mysqli_fetch_array($result)) { 
?>

    <button class="row mb-3" 
            style="
                   margin: auto;
                   width: 90%;
                   color: #2C2C2C;
                   background: #FCE499;
                   box-shadow: 5px 4px 10.5px 0px rgba(0, 0, 0, 0.1);
                   padding:10px;
                   ">
         
         <a class="col-6" href="MainGroup.php?group_id=<?php echo $row['group_id']; ?>" onclick="submitForm()" style="color:#000; text-align: left;">   
         <form id="groupForm" action="MainGroup.php" method="post">
            <input type="hidden" id="group_id" name="group_id" value="<?php echo $row['group_id']; ?>">
            <div style="font-size:25px;"> 
                <?php echo $row['group_name']; ?>
            </div>              
            </form> 
        </a>  



     

    <div class="col-6" style="margin:auto;">
    <form id="deForm" action="DeleteGroup.php" method="post">
    <input type="hidden" name="group_id" value="<?php echo $row['group_id']; ?>">
        <?php 
        /* echo $row['user_id']; */
        if($id == $row['user_id']){ ?>
            <a type="submit"
                style="
                width: 20%;
                color:#FFF;
                border-radius: 5px;
                background:#FF5151;
                padding:5px;
                float: right;
                border: none;
                "
                onclick=" deleteForm(); return confirm('คุณต้องการลบกลุ่มหรือไม่? !!!')">
                ยกเลิกกลุ่ม
        </a>
        <?php  } ?>
        </form>
    </div>

      
</button>

<script>
    function submitForm() {
        // ดึงค่า group_id จาก input hidden
        var group_id = document.getElementById('group_id').value;
        
        // กำหนดค่า group_id ใน input hidden ในฟอร์ม
        document.getElementById('group_id').value = group_id;
        
        // ส่งฟอร์มไปยัง MainGroup.php
        document.getElementById('groupForm').submit();
    }
    function deleteForm() {
        // ดึงค่า group_id จาก input hidden
        var group_id = document.getElementById('group_id').value;
        
        // กำหนดค่า group_id ใน input hidden ในฟอร์ม
        document.getElementById('group_id').value = group_id;
        
        // ส่งฟอร์มไปยัง MainGroup.php
        document.getElementById('deForm').submit();
    }
</script>

<?php  

}mysqli_close($conn);
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