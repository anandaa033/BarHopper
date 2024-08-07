<?php session_start(); ?>
<!doctype html>
<html>

<head>
<title>History</title>
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
  background-image: url("img/people-concert.jpg");
  position:sticky;
}
.center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 18px;
}

</style>
</head>

<body>
    <?php
  include("MenuBar.php");
  ?>

    <h1 class="nametable" style="color: #0f0f0f;
    padding-top: 40px;
    margin-left: 60px;
    padding-left: 50px;
    font-size: 30px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;">History</h1>

    <br>

    <div class="container" style="border-radius: 15px;
    border: 1px solid #9A9A9A; 
    opacity: 0.8; 
    background: #FFF;">
        <div class="box d-flex" style="border-bottom: solid 1px #9A9A9A;">
            <div class="pigtb" style="padding: 20px;">
                <img src="../img/rordbear.png" alt="Flowers in Chania" width="50px; ">
            </div>
            <div class="smbox">
                <h1 class="namelan" style="padding-left: 10px; 
              padding-top: 20px; font-weight: 600; font-size:25px;">Road bear</h1>
                <h2 class="date" style="padding-bottom: 10px;
              padding-left: 10px ; font-size: 15px;">22/11/2023</h2>
            </div>
        </div>

        <div class="box d-flex" style="border-bottom: solid 1px #9A9A9A;">
            <div class="pigtb" style="padding: 20px;">
                <img src="../img/redtable.png" alt="Flowers in Chania" width="50px; ">
            </div>
            <div class="smbox">
                <h1 class="namelan" style="padding-left: 10px; 
                padding-top: 20px; font-weight: 600; font-size:25px;">Red Table</h1>
                <h2 class="date" style="padding-bottom: 10px;
                padding-left: 10px ; font-size: 15px;">22/11/2023</h2>
            </div>
        </div>

        <div class="box d-flex">
            <div class="pigtb" style="padding: 20px;">
                <img src="../img/rooftop.png" alt="Flowers in Chania" width="50px; ">
            </div>
            <div class="smbox">
                <h1 class="namelan" style="padding-left: 10px; 
                padding-top: 20px; font-weight: 600; font-size:25px;">Roof Top</h1>
                <h2 class="date" style="padding-bottom: 10px;
                padding-left: 10px ; font-size: 15px;">22/11/2023</h2>
            </div>
        </div>

    </div>



</body>

</html>