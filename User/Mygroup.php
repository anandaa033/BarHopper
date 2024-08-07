<?php session_start(); ?>
<!doctype html>
<html>

<head>
<title>Mygroup</title>
  <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>

<?php
	include("MenuBar.php");
  	?>

    <div class="pig" style="padding-top: 20px;">
        <center>
            <img src="img/icon/createG.png" alt="Flowers in Chania" width="150px; ">
            <h1 class="top" style="padding: 20px 0px; font-size: 40px;">My Group</h1>
        </center>
    </div>

    <div class="row">
        <h2 class="col-5 mr-5" style=" padding-top:10px ; text-align: right; ">name group : </h2>
        <input class="col-3 " style="padding: 10px; padding: right 50px ; border: 0.5px solid; 
        border-radius: 10px; border: 1px solid #828282; background: rgba(217, 217, 217, 0.37);"></input>
    </div>

    <br>

    <div class="row mt-3 ">
        <div class="col-5" >
            <img src="img/icon/add-friend.png" alt="Flowers in Chania" width="30px" style="float: right;">
        </div>
        
            <div class="col-2" style="font-size: 20px; text-align: center;">
            <h1>Member</h1>   
         </div>
       
        <div class="col-5">
            <img src="img/icon/delete-user.png" alt="Flowers in Chania" width="30px">
        </div>
    </div>

    <center>
    <div class="boxname mt-3  " style="border-radius: 15px; 
    border: 1px solid #9A9A9A; width: 800px;
    background: #FFF;">

     <div class=" grid grid-cols-5  ">
        <div class=" col-span-2 mt-5  grid justify-end " >
        <img src="img/User/Faung.jpg" alt="alt=" " width="150px; ">
    </div>
        <div class="col-span-3 mt-20 pl-20  grid justify-item-start ">
         <h1 class="name" style="padding: 20px 50px; font-size: 20px ; text-align: left;">Aphatsara Inchoo</h1>
    </div>
    </div>

    <div class=" grid grid-cols-5 mb-5 ">
        <div class=" col-span-2 mt-5  grid justify-end " >
        <img src="img/User/soda.jpg" alt="alt=" " width="150px; ">
    </div>

        <div class="col-span-3 pt-20 pl-20  grid justify-item-start ">
         <h1 class="name" style="padding: 20px 50px; font-size: 20px;  text-align: left;">Pharwinee Wichitsak</h1>
    </div>
    </div>

    </div>
   </center>

   <center class="boxtext ml-5 mt-3 mb-3">
    <a href="Survey.php">
    <p class="d-inline-flex mt-2 ml-5" style="padding-top: 20px; ">
        <button type="button" class="btn btn-lg" style="border-radius: 15px;
    color: #FFF; padding: 15px 70px; padding-bottom: 20px;
    background: #176B87;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px
    rgba(0, 0, 0, 0.25) inset; ">servey</button>
    </a>
    </p>
</center>


</body>

</html>