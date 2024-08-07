<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>M Profile</title>
  <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">

</head>

<style>
.testclass {
  background-image: url("../img/bgEnt.png");
  position:sticky;
}
</style>

<body style="background: #FDF8F4;">


<?php
include("EntMenuBar.php");
require("../ConfigDB.php");

?>




<div class="mb-1">
        <img class="testclass" style="width: 100%; height: 300px; background-size:cover;">
    </div>
      
        <p class="d-inline-flex gap-5 ">
          <input name="group_id" type="hidden" id="group_id" value="<?php echo $row['group_id'];?>" /></td>
            <a href="InsertGroup.php?group_id=<?php echo $row['group_id']; ?>">
        <center>

        <p style=" margin-right: 65%;  font-size:40px; color:#132640 ;">My Profile</p>


    <div style="width: 80%;
            border-radius: 15px;
            border: 5px solid #E3C436;
            padding:auto;
            padding-top:1%;
            padding-bottom:1%;
            margin-top:20px;
            margin-bottom: 3%;">

    <div class="row mt-3">
        <h2 class="col-2" style=" padding-top:5px; color:#132640 ; text-align: left; 
                                  margin-left: 25px; font-size:26px; font-weight:400;  ">Name : </h2>
        <div class="col-6" style="padding: 10px; border: 1px solid #828282; 
        border-radius: 10px; background: #fff;">
        
    </div>
    </div>

    <br>
    <div class="row">
        <h2 class="col-2" style=" padding-top:5px ; color:#132640 ; text-align: left; 
                                  margin-left: 25px;  font-size:26px; font-weight:400;  ">ID : </h2>
        <div class="col-6" style="padding: 10px; border: 1px solid #828282; 
        border-radius: 10px; background: #fff; "></div>
    </div>

    <br>
    <div class="row">
        <h2 class="col-2" style=" padding-top:5px ; color:#132640 ; text-align: left; 
                                  margin-left: 25px;  font-size:26px; font-weight:400; ">Gmail : </h2>
        <div class="col-6" style="padding: 10px; border: 1px solid #828282; 
        border-radius: 10px; background: #fff; "></div>
    </div>

    <br>
    <div class="row mb-3">
        <h2 class="col-2" style=" padding-top:5px ; color:#132640 ; text-align: left; 
                                  margin-left: 25px;  font-size:26px; font-weight:400;">Password : </h2>
        <div class="col-6" style="padding: 10px; border: 1px solid #828282; 
        border-radius: 10px; background: #fff; "></div>
    </div>

</div>
<a style="color: #FFF;" href="EditMyProfile.php">
        <button type="button" class="btn btn-lg mb-5" 
        style="         color: #FFF;
                        border-radius: 5px;
                        margin: auto;
                        width: 30%;
                        border: 0px solid #000;
                        background: #F07028;
                        box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25);
                        padding:10px;
                        font-size:20px;">แก้ไขโปรไฟล์</button></a>



<script>
    if ( window.history.replaceState ) {
	    window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>