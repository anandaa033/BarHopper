<?php session_start(); ?>
<!doctype html>
<html>

<head>
<title>Create Group</title>
  <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
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
            <img src="img/createG.png" alt="Flowers in Chania" width="150px; ">
            <h1 class="top" style="padding: 20px 0px; font-size: 40px;">Create Group</h1>
        </center>
    </div>

    <div class="columns-3">
        <h2 class="nameG " style="padding-left: 50%; padding-top:10px ;">name group : </h2>
        <div class="box " style="padding: 20px; padding: right 50px ; border: 0.5px solid; 
        border-radius: 10px; border: 1px solid #828282; background: rgba(217, 217, 217, 0.37);"></div>
    </div>
    <br>
    
   

    <div class="columns-3">
        <h2 class="nameG " style="padding-left: 80%; padding-top:20px ;"> </h2>
        <div class="box col-span-2" style="padding: 10px; padding: right 5px ; border: 0.5px solid;
        border-radius: 10px; border: 1px solid #828282; background: rgba(217, 217, 217, 0.37);">
            <h2 class="nameG " style=" font-weight: 300; font-size: 20px;">search : </h2>
        </div>
       

    </div>
   
   
    <div class=" grid grid-cols-5  ">
        <div class=" col-span-2 pt-20  grid justify-end " >
        <img src="img/User/Faung.jpg" alt="alt=" " width="150px; ">
    </div>
        <div class="col-span-3 pt-20 pl-20  grid justify-item-start ">
         <h1 class="name" style="padding: 60px 50px; font-size: 20px">Aphatsara Inchoo</h1>
    </div>
    </div>

    <div class=" grid grid-cols-5  ">
        <div class=" col-span-2 pt-10  grid justify-end " >
        <img src="img/User/Faung.jpg" alt="alt=" " width="150px; ">
    </div>
        <div class="col-span-3 pt-10 pl-20  grid justify-item-start ">
         <h1 class="name" style="padding: 60px 50px; font-size: 20px ; ">Aphatsara Inchoo</h1>
    </div>
    </div>

    <div class=" grid grid-cols-5  ">
        <div class=" col-span-2 pt-10  grid justify-end " >
        <img src="img/User/Faung.jpg" alt="alt=" " width="150px; ">
    </div>
        <div class="col-span-3 pt-10 pl-20  grid justify-item-start ">
         <h1 class="name" style="padding: 60px 50px; font-size: 20px ">Aphatsara Inchoo</h1>
    </div>
    </div>

    






</body>

</html>