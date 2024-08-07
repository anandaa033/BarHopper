<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สมาชิกกลุ่ม</title>
<link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">

<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
    #map {
      height: 500px;
      width: 1000px;
      margin: 40px;
    }

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

    input[type="submit"],
    input[type="reset"] {
      background-color: #176B87;
      color: #fff;
      cursor: pointer;
      border-radius: 5px;
      border: none;
      margin-top: 10px;
      margin-bottom: 15px;
      padding: 8px 30px;
      font-size: 16px;
    }
  </style>
</head>

<body style="background:#FFFDF3;">
<?php
if ($_SESSION['usertype_id'] == "2") {
    include("MenuBar.php");

    require("../ConfigDB.php");
    $sql = "USE zbvfpszw_group_recommen";
    $conn->query($sql);

    $group_id = (isset($_GET['group_id']) ? $_GET['group_id'] : '');
    $_SESSION['group_id'] = $group_id;
    $id = $_SESSION["user_id"];

    $query = "SELECT m.groupmember_id, m.group_id, m.user_id, u.user_name 
          FROM `groupmember` m 
          INNER JOIN user u ON m.user_id = u.user_id
          WHERE m.group_id = $group_id 
          AND (m.user_id, m.groupmember_id) IN 
            ( SELECT user_id, MAX(groupmember_id)
              FROM `groupmember`
              WHERE group_id = $group_id
              GROUP BY user_id)
          ORDER BY m.user_id DESC;";

    $result = mysqli_query($conn, $query);

    $checkq = "SELECT * FROM `groups`
WHERE group_id = $group_id";
    $result2 = mysqli_query($conn, $checkq);

    while ($row2 = mysqli_fetch_array($result2)) {
        $group_id2 = $row2['group_id'];
        $Gname2 = $row2['group_name'];
        $user_id2 = $row2['user_id'];
    }

    $userVote = false;

    echo "<div id='content-container'>";

    require("../ConfigDB.php");
    $sql = "USE zbvfpszw_group_recommen";

    ?>

    <div style="background: #F8DAD3;
            padding:40px 0 40px 0">
        <div class="row"
             style="width: 90%;
            margin:auto;
            ">
            <div style="font-size:50px;">My Group</div>
            <div class="col-6"
                 style="color:#F07028; font-size:40px;"><?php echo $Gname2; ?></div>
            <div class="col-6">

                <a style="color: #FFF;"
                   href="LeaveGroup.php?group_id=<?php echo $group_id2; ?>&user_id=<?php echo $user_id2; ?>">

                    <button onclick="return confirm('Do you want to Leave Group !!!')"
                            style="width:30%; border-radius: 5px;
            color:#fff; padding: 10px;
            background: #2C2C2C; float: right; margin:0 40px 0 0;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px
            rgba(0, 0, 0, 0.25) inset; ">ออกจากกลุ่ม</button>
                </a>

                <?php
                if ($user_id2 == $id) { ?>
                    <a style="color: #FFF;" href="CreateSurvey.php?group_id=<?php echo $group_id2; ?>">
                        <button
                                style="width:30%; border-radius: 5px;
            color:#fff; padding: 10px;
            background: #F07028; float: right; margin:0 20px 0 0;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px
            rgba(0, 0, 0, 0.25) inset; ">สร้างแบบสอบถาม</button>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div style="width: 90%;
            border-radius: 15px;
            border: 5px solid #E3C436;
            margin:auto;
            margin-top:50px;
            padding:20px">
        <?php
        $resurvey = "SELECT *  FROM survey
        WHERE group_id = $group_id2 ORDER BY survey_id DESC LIMIT 1;";
        $result3 = mysqli_query($conn, $resurvey);

        $userFound = false;
        $StartRank = false;
        $Vote = false;

        while ($row3 = mysqli_fetch_array($result3)) {

            $survey_id = $row3['survey_id'];

            $resurvey_item = "SELECT *  FROM `survey_item`
            WHERE survey_id = $survey_id AND user_id = $id";
            $result4 = mysqli_query($conn, $resurvey_item);


            while ($row4 = mysqli_fetch_array($result4)) {
                $idcheck = $row4['user_id'];
                if ($id == $idcheck) {
                    $userFound = true;
                    break;
                }
            }

            if (!$userFound) {
                ?>
                <a style="color: #FFF;"
                   href="Survey.php?group_id=<?php echo $group_id; ?>&survey_id=<?php echo $row3['survey_id']; ?>">
                    <button style="width:30%; border-radius: 5px;
                         color:#fff; padding: 10px;
                         background: darkblue; margin: 0 0 20px 0;
                         box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25),
                         -7px -6px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                        ทำแบบสอบถาม
                    </button>
                </a>
                <?php
            }
            $resurvey_item = "SELECT * FROM `rank`";
            $result5 = mysqli_query($conn, $resurvey_item);
            $userRec = false;


            while ($row5 = mysqli_fetch_array($result5)) {
                $idcheck = $row5['survey_id'];
                if ($survey_id == $idcheck) {
                    $userRec = true;
                    break;
                }
            }
            if ($user_id2 == $id && !$userVote && $userFound && !$userRec) {
                ?>
                <a style="color: #FFF;"
                   href="Top3.php?group_id=<?php echo $group_id; ?>&survey_id=<?php echo $row3['survey_id']; ?>">
                    <button onclick="return confirm('คุณแน่ใจแล้วหรือไม่! เพื่อนที่ยังไม่ทำแบบสอบถามจะไม่มีส่วนในการนำมาแนะนำ')"
                            style="width:30%; border-radius: 5px;
                       color:#fff; padding: 10px;
                       background: darkred; margin: 0 0 20px 0;
                       box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25),
                       -7px -6px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                        เริ่มรายการแนะนำ
                    </button>
                </a>
                <?php

            }
            $StartRank = true;

            $post_rating = "SELECT *  FROM `post_rating`
                            WHERE survey_id = $survey_id AND userid = $id";
            $resultVote = mysqli_query($conn, $post_rating);


            while ($rowVote = mysqli_fetch_array($resultVote)) {
                $idcheck = $rowVote['userid'];
                if ($id == $idcheck) {
                    $userVote = true;
                    break;
                }
            }

            if (!$userVote && $userFound && $StartRank && $userRec) {
                ?>

                <center>
                    <a style="color: #FFF;"
                       href='ShowEnt.php?group_id=<?php echo $group_id; ?>&user_id=<?php echo $id; ?>&survey_id=<?php echo $row3['survey_id']; ?>'>
                        <button type="button" class="btn btn-lg"
                                style="         color: #FFF;
                border-radius: 5px;
                margin-bottom: 20px;
                width: 100%;
                border: 0px solid #000;
                background: darkgreen;
                box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25);
                padding:10px;
                font-size:20px;">โหวตเลือกร้าน
                        </button></a>
                </center>
                <?php
            }
            $Vote = true;
        }

        ?>

        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <div class="row mb-2"
                 style="border-radius: 5px;
                        margin: auto;
                        border: 0px solid #000;
                        background: #FFF;
                        box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25);
                        padding:10px">
                <div class="col-9">
                    <div class="col" style="padding:inherit; padding-left:20px; font-size:30px;">
                        <?php echo $row['user_name']; ?>
                    </div>
                </div>
                <div class="col-3 row  justify-content-md-end">
                <div class="col-9 d-md-flex " style="margin:auto;">
                        <?php
                        if ($row3 = mysqli_fetch_array($result3)) {
                            $checkid = $row['user_id'];

                            $resurvey_itemcheck = "SELECT *  FROM `survey_item`
                            WHERE survey_id = $survey_id AND user_id = $checkid";

                            $resultcheck = mysqli_query($conn, $resurvey_itemcheck);
                            $rowtest = mysqli_fetch_assoc($resultcheck);

                            $Found = false;
                            if ($rowtest != null) {
                                $check = $rowtest['user_id'];

                                if ($row['user_id'] == $check) {
                                    $Found = true;
                                }
                            }

                            $post_ratingcheck = "SELECT *  FROM `post_rating`
                            WHERE survey_id = $survey_id AND userid = $checkid";

                            $ratingcheck = mysqli_query($conn, $post_ratingcheck);
                            $rowrating = mysqli_fetch_assoc($ratingcheck);

                            $RatingFound = false;
                            if ($rowrating != null) {
                                $check = $rowrating['userid'];

                                if ($row['user_id'] == $check) {
                                    $RatingFound = true;
                                }
                            }
                            if ($Found&&!$RatingFound) {
                                echo "<div style='font-size: 16px; color:#F07028; margin:auto 0;'>ทำแบบสอบถามแล้ว</div>";
                               /*  echo "<i class='material-icons' style='font-size: 40px; color:green; margin:auto;'>check</i>"; */
                            } 
                            else if (!$Found&&!$RatingFound) {
                                echo "<div style='font-size: 16px; color:gray; margin:auto 0;'>รอทำแบบสอบถาม</div>";
                                /* echo "<i class='material-icons' style='font-size: 40px; color:gray; margin:auto;'>more_horiz</i>"; */
                            }
                            else if ($Found&&$RatingFound) {
                                echo "<div style='font-size: 16px; color:green; margin:auto 0;'>ลงคะแนนแล้ว</div>";
                                /* echo "<i class='material-icons' style='font-size: 40px; color:gray; margin:auto;'>more_horiz</i>"; */
                            }
                        }
                        ?>
                        </div>
                    <div class="col-3 d-md-flex justify-content-md-end" style="margin:auto;">
                        <?php 
                            if ($user_id2 == $id && $row['user_id'] != $id) { ?>
                            <a href='DeleteMember.php?user_id=<?php echo $row['user_id']; ?>'
                               onclick="return confirm('Do you want to delete this member? !!!')">
                                <button type="button" class="btn btn-danger" style=" width:100px;">
                                    ลบสมาชิก
                                </button>
                            </a>

                        <?php } ?>
                    </div>
                    


                </div>
            </div>
            </center>
            <?php
        } ?>
        <p class="d-inline-flex gap-5 ">
            <input name="group_id" type="hidden" id="group_id" value="<?php echo $row['group_id']; ?>"/></td>
            <a href="AddMember.php?group_id=<?php echo $row['group_id']; ?>">
                <center>
                    <a style="color: #FFF;" href="AddMember.php">
                        <button type="button" class="btn btn-lg"
                                style="         color: #FFF;
                        border-radius: 5px;
                        margin: auto;
                        width: 100%;
                        border: 0px solid #000;
                        background: #F07028;
                        box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25);
                        padding:10px;
                        font-size:20px;">+ เพิ่มสมาชิก
                        </button></a>
                </center>
        </p>

    </div>
    <!-- ส่วนของโค้ด JavaScript สำหรับโหลดข้อมูลโดยอัตโนมัติ -->
    <script>
function refreshData() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                var responseData = JSON.parse(xhr.responseText);
                // อัปเดตข้อมูลหน้าเว็บด้วยข้อมูลที่ได้รับ
                // ตัวอย่างเช่นอัปเดตตารางหรือรายการบนหน้าเว็บ
            }
        }
    };
    xhr.open("GET", "fetch_data.php?group_id=<?php echo $group_id; ?>", true);
    xhr.send();
}

// ใช้ setInterval เพื่อเรียกใช้งานฟังก์ชัน refreshData() เพื่ออัปเดตข้อมูลทุกๆ 5 วินาที
setInterval(refreshData, 5000); // อัปเดตทุก 5 วินาที
</script>


<!-- เพิ่มตัวแสดงผลข้อมูล -->
<div id="member-container"></div>


    </div>
    <?php

    if ($Vote) {
        $ResultVote = false;
        $sqlvote = "SELECT *  FROM post_rating
WHERE survey_id = $survey_id";
        $result = mysqli_query($conn, $sqlvote);


        while ($row4 = mysqli_fetch_array($result)) {

            $ResultVote = true;
            break;
        }

        if ($ResultVote) {

            include("VoteResults.php");
        }
    }
    ?>
    <?php
} else
    echo "<meta http-equiv=\"Refresh\" content=\"1; url=../Login.php\">";
?>
</body>
</html>
