<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<link rel="website icon" type="png" href="img/Logo/Logo-Project.png">
<style>
   
</style>
<body style="background: #F9F4E6;">
    <div class="text-neutral-50  grid grid-flow-row-dense ..." style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); padding: 10px 0px; padding-bottom: 10px; background-color: #FDF8F4; box-shadow: 0px 4px 22px -2px rgba (0, 0, 0, 0.25); border-bottom: 3px solid #E3C436;">
        <div class="grid grid-flow-row-dense grid-cols-1">
            <div class="nameapp " style="font-weight: bold; font-size: 30px; font-weight: 400;  line-height: normal; font-style: normal; color: #F07028; text-align: center; font-family: 'Kapakana';  "> Bar Hopper </div>
        </div>
    </div>

    <div class="container  mt-5" style="background-color: #FCE499 ;  padding: 0;">
        <form id="myForm" method="post">
            <div class="boxlg col-5 d-flex" >  
                <img src="img/register.png" alt="Flowers in Chania" width="60%; "> 
                <center></center>  
                <div class="boxL ml-5 mt-4">
                    <h1 class="topic " style="font-size: 40px; color: rgb(0, 0, 0);  font-weight: 700; font-size: 40px ; padding-left:5% ;  ">ลงทะเบียน</h1> 
                    
                    <p class="type mt-4" style="font-size: 25px; color: #000000; padding-left:10%;">เลือกประเภทผู้ใช้</p>
                    <div class="boxradio d-flex">
                        <div class="form-check mt-2" style="padding-left: 15%; color: #000000">
                            <input class="form-check-input" type="radio" name="usertype" value="1" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                เจ้าของร้าน
                            </label>
                        </div>
                        <div class="form-check mt-2" style="padding-left: 15%; color: #000000;">
                            <input class="form-check-input" type="radio" name="usertype" value="2" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                ผู้ใช้ทั่วไป
                            </label>
                        </div>
                    </div>

                    <div class="boxM ml-3 mt-4" style="padding: 0 70px;" >
                        <div class="textboxM" name="username" style="color: #4F5C6E; " >ชื่อ :</div>
                        <input class="boxS" name="username" type="text" style="border-radius: 10px; width: 600px; height: 50px; flex-shrink: 0; border: 1px solid rgba(125, 125, 125, 0.6); background-color: white; padding-left:2%;">
                    </div>

                    <div class="boxM ml-3 mt-3" style="padding: 0 70px;" >
                        <div class="textboxM" name="email" style="color: #4F5C6E;">อีเมล :</div>
                        <input class="boxS" name="email" type="email" style="border-radius: 10px; width: 600px; height: 50px; flex-shrink: 0; border: 1px solid rgba(125, 125, 125, 0.6); background-color: white; padding-left:2%;">
                    </div>

                    <div class="boxM ml-3 mt-3" style="padding: 0 70px;" >
                        <div class="textboxM" name="pass" style="color: #4F5C6E;">รหัสผ่าน :</div>
                        <input class="boxS" name="pass" type="password" style="border-radius: 10px; width: 600px; height: 50px; flex-shrink: 0; border: 1px solid rgba(125, 125, 125, 0.6); background-color: white; padding-left:2%;">
                    </div>

                    <center class="boxtext ml-5 mt-5">
                        <button type="submit" class="btn btn-lg" 
                        style="border-radius: 15px; color: #FFF; 
                         padding: 15px 40px;
                         margin-bottom: 5%; background: #F07028; 
                         width: 80%; 
                         box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px rgba(0, 0, 0, 0.25) inset;
                         ">ยืนยัน</button>
                    </center>
                </div>
            </div>
        </form>
        
        <?php 
            $name = isset($_POST['username']) ? $_POST['username'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
            $usertype = isset($_POST['usertype']) ? $_POST['usertype'] : '';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require("ConfigDB.php");
                $sql = "USE zbvfpszw_group_recommen";
                $conn->query($sql);

                $password = "user_password";
                $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);

                $sql = "INSERT INTO user VALUES(null, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $name, $usertype, $email, $hashedPassword);

                if ($stmt->execute()) {
                    echo "<div style='margin-top:.5rem;'>เก็บค่า Radio ลงฐานข้อมูลเรียบร้อย</div>";
                } else {
                    echo "Error: " . $sql . "<br>" . $stmt->error;
                }

                $stmt->close();
                $conn->close();
                echo "<meta http-equiv=\"Refresh\" content=\"1; url=Login.php\">";
            }
        ?>
    </div>
</body>
</html>
