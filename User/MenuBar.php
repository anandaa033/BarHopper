<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>
a:link {
  text-decoration: none;
}
a:hover {
  text-decoration: none;
}

</style>

</head>
<body>
  <?php
  include("../ConfigDB.php");
  ?>
  <div class="sticky-top justify-content-end text-neutral-50  grid grid-flow-row-dense grid-cols-3  ..."
  style=" padding-bottom: 10px; padding: 10px 0;  background: #FDF8F4; border-bottom:3px solid #E3C436;">
    <div class="grid grid-flow-row-dense grid-cols-1" style=" padding: 5px; font-size: 18px;">
        <div style="padding:inherit; color: #F07028; padding-left: 25px; margin-top:auto;"> 
        <?php echo $_SESSION["user_name"]; ?>
        </div>
    </div>

    <div class="grid grid-flow-row-dense grid-cols-1">
        <div class="text-yellow-500" style="font-weight: bold; font-size: 20px; text-align: center;">
          <center><img src="../img/Logo/logo_Barhopper.png" width="40px" height="40px"></center>
        </div>
    </div>
    <div class="grid grid-flow-row-dense grid-cols-4 text-neutral-50" 
    style="text-align: right;  padding: 5px; text-transform: uppercase; text-decoration: none;"> 
        <!-- border: 1px solid; -->
        <div></div>

        <div style="text-align: center; padding:inherit;">
          <!-- <a href="#" style="color: #4F5C6E">my profile</a> -->
        </div>
        <div style="text-align: center; padding:inherit; margin-top:auto;">
          <a href="UserHome.php" style="color: #4F5C6E">home</a>
        </div>
        <div style="text-align: center; padding:inherit; margin-top:auto;" >
          <a href="../logout.php" style="color: #4F5C6E"
          onclick="return confirm('Do you want to logout? !!!')"
          >logout</a>
        </div>
    </div>
  </div>

</body>
</html>