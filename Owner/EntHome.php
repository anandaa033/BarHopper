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
  position: sticky;
}

.center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 18px;
}

.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>

<body style="background-color:#FDF8F4;">
    <?php 
    if($_SESSION['usertype_id']=="1"){
      include("EntMenuBar.php"); 
    ?>    
<?php


require("../ConfigDB.php");
$sql = "USE zbvfpszw_group_recommen";
$conn->query($sql);
$id = $_SESSION["user_id"];

$query = "SELECT * FROM entertainment e INNER JOIN user u ON e.user_id = u.user_id
WHERE u.user_id = $id GROUP BY e.Ent_id ORDER BY e.Ent_id DESC;"; 
 
//ประกาศตัวแปร sqli
$result = mysqli_query($conn, $query);?>

<div class="mb-1">
        <img class="testclass" style="width: 100%; height: 300px; background-size:cover;">
    </div>

        <p class="d-inline-flex gap-5 ">
          <input name="ent_id" type="hidden" id="ent_id" value="<?php echo $row['Ent_id'];?>" /></td>
                    <a href="EntEdit.php?Ent_id=<?php echo $row['Ent_id']; ?>">
        <div class="addEnt " style=" text-align: right; margin-right: 5%; ">
        <a style="color: #FFF;" href="EntInserted.php">
            <button type="button" class="btn btn-lg" style="width:20%; border-radius: 15px;
             color:#FFF; padding: 15px 40px; padding-bottom: 20px;
             background: #2C2C2C; 
             font-weight: bold;
             box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px
             rgba(0, 0, 0, 0.25) inset; ">+เพิ่มร้านใหม่</button></a>
        </div>
        <div class="mygroup" style="color: #132640; font-family: Kaisei Decol;
                                    font-size: 48px; margin-left: 5%;
                                    font-style: normal;
                                    font-weight: 700;
                                    line-height: normal;">My Entertainment</div>
        </p>
<!-- //สร้างตัวแปร $row มารับค่าจากการ fetch array -->
<?php while($row = mysqli_fetch_array($result)) { 
?>
    

<div class="row mb-2" 
                  style="border-radius: 10px;
                        margin: auto;
                        width: 90%;
                        border: 1px solid #D7D7D7;
                        background: #FFF;
                        box-shadow: 4px 3px 5px 0px rgba(0, 0, 0, 0.15);
                        padding:10px">
                <div class="col-6">
                  <div class="row">
                  <!-- <div class="col-2">
                      <center><img src="img/logoRes/logo.png" width="45px" height="45px" style="border-radius: 50%; border:#000 solid 1px;"></center>
                  </div> -->
                  <div class="col" style="padding:inherit; padding-left:20px; font-size:30px;"> 
                      <?php echo $row['ent_name']; ?>
                  </div>
                  </div>
                </div>
                <div class="col-6 d-md-flex justify-content-md-end">
                  <input name="ent_id" type="hidden" id="ent_id" value="<?php echo $row['Ent_id'];?>" /></td>
                    <a href="EntEdit.php?Ent_id=<?php echo $row['Ent_id']; ?>">
                      <button type="button" class="btn btn-warning" style=" width:80px; margin-right:5px;">
                        แก้ไข
                      </button>
                    </a>
                    
                    <a href='EntDelete.php?ent_id=<?php echo $row['Ent_id']; ?>' onclick="return confirm('Do you want to delete this record? !!!')">
                      <button type="button" class="btn btn-danger" style=" width:80px;">
                        ลบ
                      </button>
                    </a>
                </div> 
            </div>
<?php  
}mysqli_close($conn);
}else
echo "<meta http-equiv=\"Refresh\" content=\"1; url=EntHome.php\">";
?>
<script>
    if ( window.history.replaceState ) {
	    window.history.replaceState( null, null, window.location.href );
    }
</script>


</body>

</html>