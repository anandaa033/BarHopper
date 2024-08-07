<?php session_start(); ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

<style>
</style>
</head>
<link rel="website icon" type="png" href="img/Logo/Logo-Project.png">
<body style="background:#FFFDF3;"> 
<div class="text-neutral-50  grid grid-flow-row-dense  ..."
        style=" box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); padding: 10px 0px; padding-bottom: 10px;
        background-color: #FDF8F4; box-shadow: 0px 4px 22px -2px rgba (0, 0, 0, 0.25); border-bottom: 3px solid #E3C436; ">

        <div class="grid grid-flow-row-dense grid-cols-1">
            <div class="nameapp " style="font-weight: bold; font-size: 30px; font-weight: 400;  line-height: normal; font-style: normal;
                    color: #F07028; text-align: center; font-family: 'Kapakana';  "> 
                    Bar Hopper </div>
        </div>

    </div>

<?php
if(isset($_SESSION['code_error'])){
	echo $_SESSION['code_error']."</br>";
	unset($_SESSION['code_error']);	
}
if(isset($_POST['submit'])){
	require("ConfigDB.php");
	if(!$conn->query($sql))
		die("error ".$conn->error);	
    $username = (isset($_POST['user_email']) ? $_POST['user_email'] : '');
	  $pass = (isset($_POST['pass']) ? $_POST['pass'] : '');
	  $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);



	$sql = "SELECT * FROM user WHERE user_email = '$username'";
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$data = $result->fetch_array();
    if (password_verify($pass, $data['user_password'])){
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['usertype_id'] = $data['usertype_id'];
        $_SESSION['user_email'] = $data['user_email'];
        $_SESSION['user_name'] = $data['user_name'];
	}else{
	$_SESSION['code_error'] = "กรุณากรอก Username และ Password ใหม่ค่ะ</br>";
		echo "<meta http-equiv=\"Refresh\" content=\"2\">";
		//header("Location:index.php");
	}	
}  else{
  $_SESSION['code_error'] = "กรุณากรอก Username และ Password ใหม่ค่ะ</br>";
    echo "<meta http-equiv=\"Refresh\" content=\"2\">";
    //header("Location:index.php");
  }	
$conn->close();
}


if(!(isset($_SESSION['usertype_id']))){
    ?>
     
     <div class="row container" style="margin:auto ; margin-top:100px;">
     <div class="col-6 mt-5 " >
     
     <center><div><h1 class="texttop" style=" font-size: 30px; font-weight: 600;" >เข้าสู่ระบบ</h1></div></center>
        
        <form  method="post" action="" autocomplete="off" class="">
         <div class="row">
         <div class="col-2 pt-5" style="margin:auto">อีเมล</div>
          <div class="col-10">
            <input type="text" class="box" name="user_email" autofocus style="border-radius: 10px; margin-top: 60px; 
                    width: 90%; height: 50px; 
                    border: 1px solid rgba(125, 125, 125, 0.6);
                    padding: 10px;
                    
                    background-color: white;
                    background: #ffffff;"></div> 
                    
        </div> 
        
        <div class="row">
        <div class="col-2 pt-5" style="margin:auto">รหัสผ่าน</div>
        <div class="col-10"><input type="password" class="box mt-5" name="pass" style="border-radius: 10px;
                    width: 90%; height: 50px; padding-right: 20%;
                    border: 1px solid rgba(125, 125, 125, 0.6);
                    padding: 10px;    padding-left: 10px;
                    background-color: white; 
                    background: #ffffff;">
        </div>
        </div>
        

        <center>
          <div><button type="submit" name="submit"
          style="border-radius: 15px;  margin-top: 60px;  
                    color: #FFF; padding: 15px 20px; padding-bottom: 20px;
                    font-size:20px;
                    width: 420px;
                    background: #F07028; 
                    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px
                    rgba(0, 0, 0, 0.25) inset; "> ยืนยัน </button></div>
        </center>


        <center>
            <div>
          <a style="color: gray;" href="Register.php">
            <button type="button" class="btn btn-lg" 
                    style="border-radius: 15px;  margin-top: 20px; 
                    color: #FFF; padding: 15px 20px; padding-bottom: 20px;
                    font-size:20px;
                    background: #2C2C2C; 
                    width: 420px;
                    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px
                    rgba(0, 0, 0, 0.25) inset; ">ลงทะเบียน</button></a>
          </div>
          </center>

</from>
    </div>
        <div class="row col-6" style="background: #FCE499 ; margin-left: auto;" >
        <div class="col-7 textdetail d-flex">
            <div class="text" style="padding:30px; padding-bottom:0px;">
            <center><img src="img/Logo/logo_Barhopper.png" width="40%" height="40%"></center>
               <center> <p class="t1 " style="margin-top: 5%; font-size: 30px; font-weight: 600; ">เว็ปไซต์</p>
               <div class="t2" style="font-size: 18px; "> <p>ระบบแนะนำสถานที่นัดพบแบบกลุ่ม</p>
                <p>กรณีศึกษา สถานบันเทิง</p>
                <p>ในจังหวัดสุราษฎร์ธานี</p> </div> </center>
                <br>
                <center> <p class="t1 " style="font-size: 30px; font-weight: 600; margin-top: 15%; ">จัดทำโดย</p>
               <div class="t2" style="font-size: 18px; "> <p>นางสาวภาวินี วิจิตรศักดิ์</p>
                    <p>นายอนันดา จุลวรรณโณ</p> </div> </center>
                <br>
          </div>
        </div>
        <div class="col-5" style="right: 0px;"> <img src="img/login.png" alt="Flowers in Chania"></div>
       </div>
    </div>
    <?php
    }
    
    if(isset($_SESSION['usertype_id'])){
        //Usertype_id = 1 = owner , Usertype_id = 2 = user
    if($_SESSION['usertype_id']=="1"){		
      header("Location:Owner/EntHome.php");
      echo "<a href=logout.php>ออกจากระบบ</a><p>";
    }else if($_SESSION['usertype_id']=="2"){	
      header("Location:User/UserHome.php");
    }
  }
    ?>

<script>
if ( window.history.replaceState ) {
	window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>