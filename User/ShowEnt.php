<?php session_start(); 
?>

<html>
<head>
    <title>Show Map</title>
  <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">
    <meta charset="utf-8" />
    <!-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>

<style>
.container {
  position: relative;
  text-align: center;
  /* color: white; */
  
}
.item{
  border:solid 2px green;
  color:green;
  border-radius:15px;  
  text-align: center;
  font-size: 14px;
}
.bt{
  border: none;
  color: white;
  padding: 10px 28px;
  font-size: 16px;
  cursor: pointer;
}


.bottom-right {
  width: 150px;
  position: absolute;
  bottom: 30px;
  right: 30px;
  border-radius: 32px;
  background: rgba(255, 154, 52, 0.84);
  filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.75));
}

.bottom-right:hover {
  font-weight: bold;
  background: #f68e00;
}

.img{

            height: 300px;
            width: 530px;
            overflow: hidden;
            border: solid 1px gray;
}

.botton {
  padding: 5px;
  width: 150px;
  bottom: 30px;
  right: 30px;
  border-radius: 32px;
  background: darkcyan;
  filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.75));
}

.botton:hover {
  font-weight: bold;
  background: darkcyan;
}
  

</style>
  </head>
<body>

    <?php
      if($_SESSION['usertype_id']=="2"){
      include("../ConfigDB.php");
      include("MenuBar.php"); 

      $survey_id = $_GET['survey_id'];
      $group_id = $_GET['group_id'];
      $id = $_GET['user_id'];
      
      ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js"></script>

    <?php 
          $sql ="SELECT m.`Ent_id`, m.`ent_name`, m.`ent_address`, m.`ent_locationX`, m.`ent_locationY`, m.`ent_timeOpen`, m.`ent_timeClose`, m.`user_id`, m.`ent_monday`, m.`ent_tuesday`, m.`ent_wednesday`, m.`ent_thursday`, m.`ent_friday`, m.`ent_saturday`, m.`ent_sunday`, m.`ent_description`, m.`inter`, m.`pop`, m.`acoustic`, m.`country`, m.`jazz`, m.`rock`, m.`rap`, m.`EDM`, m.`folk`, m.`live_music`, m.`dj`, m.`indie`, m.`pub`, m.`bar`, m.`indoor`, m.`outdoor`, m.`cocktail_bar`, m.`restaurant`, m.`vintage`, m.`minimal`, m.`modern`, m.`camp`, m.`thai_ban`, m.`luk_thung`, r.rank_id ,r.`score`, r.`Ent_id`, r.`survey_id`
          FROM `rank` r 
          INNER JOIN `entertainment` m ON m.Ent_id = r.Ent_id
          WHERE r.survey_id = $survey_id
          GROUP BY m.Ent_id, r.rank_id;";
          $result = mysqli_query($conn,$sql);
          $i = 1;
          while($row = mysqli_fetch_array($result)){
              if ($i == 1) {
                  $Ent_id1 = $row['Ent_id'];
                  
              } elseif ($i == 2) {
                  $Ent_id2 = $row['Ent_id'];
                  
              } elseif ($i == 3) {
                  $Ent_id3 = $row['Ent_id'];
              }
              $i++;
          }
          
          $clickEnt_id = $Ent_id1;
          $sql = "SELECT * FROM `entertainment` WHERE Ent_id = $clickEnt_id";
          $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($result)){

                  $ent_timeOpen = $row['ent_timeOpen'];
                  $ent_timeClose = $row['ent_timeClose'];

                  $ent_monday_checked = ($row['ent_monday'] == 1) ? 'จันทร์' : '';
                  $ent_tuesday_checked = ($row['ent_tuesday'] == 1) ? 'อังคาร' : '';
                  $ent_wednesday_checked = ($row['ent_wednesday'] == 1) ? 'พุธ' : '';
                  $ent_thursday_checked = ($row['ent_thursday'] == 1) ? 'พฤหัสบดี' : '';
                  $ent_friday_checked = ($row['ent_friday'] == 1) ? 'ศุกร์' : '';
                  $ent_saturday_checked = ($row['ent_saturday'] == 1) ? 'เสาร์' : '';
                  $ent_sunday_checked = ($row['ent_sunday'] == 1) ? 'อาทิตย์' : '';

                  $ent_pub_checked = ($row['pub'] == 1) ? 'pub' : '';
                  $ent_bar_checked = ($row['bar'] == 1) ? 'bar' : '';
                  $ent_indoor_checked = ($row['indoor'] == 1) ? 'indoor' : '';
                  $ent_outdoor_checked = ($row['outdoor'] == 1) ? 'outdoor' : '';
                  $ent_cocktail_bar_checked = ($row['cocktail_bar'] == 1) ? 'cocktail_bar' : '';
                  $ent_restaurant_checked = ($row['restaurant'] == 1) ? 'restaurant' : '';

                  $ent_vintage_checked = ($row['vintage'] == 1) ? 'วินเทจ' : '';
                  $ent_minimal_checked = ($row['minimal'] == 1) ? 'มินิมอล' : '';
                  $ent_modern_checked = ($row['modern'] == 1) ? 'โมเดิร์น' : '';
                  $ent_camp_checked = ($row['camp'] == 1) ? 'แคมป์' : '';
                  $ent_thai_ban_checked = ($row['thai_ban'] == 1) ? 'ไทบ้าน' : '';
                  $ent_luk_thung_checked = ($row['luk_thung'] == 1) ? 'ลูกทุ่ง' : '';

                  $ent_inter_checked      = ($row['inter'] == 1) ? 'สากล' : '';
                  $ent_pop_checked        = ($row['pop'] == 1) ? 'ป็อป' : '';
                  $ent_acoustic_checked   = ($row['acoustic'] == 1) ? 'อะคูสติกส์' : '';
                  $ent_country_checked    = ($row['country'] == 1) ? 'เพื่อชีวิต' : '';
                  $ent_jazz_checked       = ($row['jazz'] == 1) ? 'แจ๊ส' : '';
                  $ent_rock_checked       = ($row['rock'] == 1) ? 'ร็อค' : '';
                  $ent_rap_checked        = ($row['rap'] == 1) ? 'แร็ป' : '';
                  $ent_EDM_checked        = ($row['EDM'] == 1) ? 'EDM' : '';
                  $ent_folk_checked       = ($row['folk'] == 1) ? 'โฟล์คซอง' : '';
                  $ent_live_music_checked = ($row['live_music'] == 1) ? 'ดนตรีสด' : '';
                  $ent_dj_checked         = ($row['dj'] == 1) ? 'dj' : '';
                  $ent_indie_checked      = ($row['indie'] == 1) ? 'อินดี้' : '';
          ?>
    <div class="grid grid-cols-5" style="width: 100%; height: 90%">
        <div class=" col-span-3 container" style="padding: 0px;">
            <div id="map" style=" width: 100%; height: 100%"></div>
            
            <div class="bottom-right" >
            <a style="color: #FFF;" href='Vote.php?group_id=<?php echo $group_id; ?>&user_id=<?php echo $id;?>&survey_id=<?php echo $survey_id;?>'>
              <button type="button" class="bt">
                VOTE
              </button>
              </a>
            </div>
        </div>
        <div class="col-span-2 bg-white" style="width: 100%; height: 100%">
          <center>
          <div class="grid grid-flow-row-dense  gap-1" style="padding:5px; background-color:#2C2C2C;">
            <!--<div class="col-span-4">
                <img src="img/logoRes/logo.png" alt="User" width="55" style="border-radius: 80%; float: right;">
            </div> -->
            <div  style="color:#F8DAD3; font-size: 35px; font-weight: bold;">
              <?php echo $row['ent_name'];?>
            </div>
          </div>
          </center>

            
            <div style=" padding: 2% 6% 0 6%;">
                
                <div id="carouselExample<?php echo $clickEnt_id; ?>" class="carousel slide img">
                    <div class="carousel-inner">
                        <?php 
                        $query2 = "SELECT * FROM entimg WHERE ent_id = $clickEnt_id";
                        $result2 = mysqli_query($conn, $query2);
                        
                        $first = true; // เพิ่มตัวแปรไว้เก็บว่าเป็นรูปภาพแรกที่ active หรือไม่
                        while($row2 = mysqli_fetch_array($result2)){ 
                            if($first) {
                                echo '<div class="carousel-item active">';
                                $first = false; // เมื่อแสดงรูปภาพแรกแล้ว กำหนดให้ตัวแปรเป็น false
                            } else {
                                echo '<div class="carousel-item">';
                            }
                            echo '<img src="../img/EntImg/'. $row2['entImg_path'] .'" class="d-block w-100"  alt="...">';
                            echo '</div>';
                        } 
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?php echo $clickEnt_id; ?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?php echo $clickEnt_id; ?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                  

                  <div class="row dd d-flex mt-3" style="width:100%;  background:#fff; 
                        border-radius: 15px; border: 2px solid #B8B8B8; padding: 20px 20px 10px 20px; margin: auto; ">
                      
                        <div class="top col-3">
                          <h1 style=" font-size:16px;">เวลา :</h1>
                        </div>

                        <div class="col-9">
                          <div class='col-8 item mb-2 mr-1 ml-1'><?php echo $ent_timeOpen . " - " . $ent_timeClose; ?></div>
                        </div>

                        <div class="top col-3">
                          <h1 style="font-size:16px;">วันเปิดร้าน :</h1>
                        </div>
                          <div class="col-9 row" style="margin:auto;">
                            <?php
                              if ($ent_monday_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'>$ent_monday_checked</div>";
                              }
                              if ($ent_tuesday_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'>$ent_tuesday_checked</div>";
                              }
                              if ($ent_wednesday_checked != '') {
                                echo "<div class='col-2 mr-1 ml-1 mb-2 item'>$ent_wednesday_checked</div>";
                              }
                              if ($ent_thursday_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1  mb-2 item'>$ent_thursday_checked</div>";
                              }
                              if ($ent_friday_checked != '') {
                                echo "<div class='col-2 mr-1 ml-1 mb-2 item'>$ent_friday_checked</div>";
                              }
                              if ($ent_saturday_checked != '') {
                                echo "<div class='col-2 mr-1 ml-1  mb-2 item'>$ent_saturday_checked</div>";
                              }
                              if ($ent_sunday_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'>$ent_sunday_checked</div>";
                              }
                            ?>
                        </div>

                        <div class="top col-3">
                            <h1 style="font-size:16px;">ประเภทร้าน :</h1>
                        </div>
                          <div class="col-9 row" style="margin:auto;"> 
                          <?php
                              if ($ent_pub_checked != '') {
                                echo "<div class='col-2 mr-1 ml-1 mb-2 item'  value='Monday'>$ent_pub_checked</div>";
                              }
                              if ($ent_bar_checked != '') {
                                echo "<div class='col-2 mr-1 ml-1 mb-2 item'  value='Tuesday'>$ent_bar_checked</div>";
                              }
                              if ($ent_indoor_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'  value='Wednesday'>$ent_indoor_checked</div>";
                              }
                              if ($ent_outdoor_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'  value='Thursday'>$ent_outdoor_checked</div>";
                              }
                              if ($ent_cocktail_bar_checked != '') {
                                echo "<div class='col-5 mr-1 ml-1 mb-2 item'  value='Friday'>$ent_cocktail_bar_checked</div>";
                              }
                              if ($ent_restaurant_checked != '') {
                                echo "<div class='col-5 mr-1 ml-1 mb-2 item'  value='Saturday'>$ent_restaurant_checked</div>";
                              }
                              
                            ?>
                          </div>

                          <div class="top col-3">
                              <h1 style=" font-size:16px;">สไตล์ร้าน :</h1>
                          </div>
                          <div class="col-9 row" style="margin:auto;"> 
                          <?php
                              if ($ent_vintage_checked != '') {
                                echo "<div class='col-4 mr-1 ml-1 mb-2 item'  value='Monday'>$ent_vintage_checked</div>";
                              }
                              if ($ent_minimal_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'  value='Tuesday'>$ent_minimal_checked</div>";
                              }
                              if ($ent_modern_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'  value='Wednesday'>$ent_modern_checked</div>";
                              }
                              if ($ent_camp_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'  value='Thursday'>$ent_camp_checked</div>";
                              }
                              if ($ent_thai_ban_checked != '') {
                                echo "<div class='col-5 mr-1 ml-1 mb-2 item'  value='Friday'>$ent_thai_ban_checked</div>";
                              }
                              if ($ent_luk_thung_checked != '') {
                                echo "<div class='col-5 mr-1 ml-1 mb-2 item'  value='Saturday'>$ent_luk_thung_checked</div>";
                              }
                              
                            ?>
                          </div>

                         <!--  <div class="top col-3">
                              <h1 style=" font-size:16px;">เพลง :</h1>
                          </div>
                          <div class="col-9 row" style="margin:auto;">
                          <?php
                              if ($ent_inter_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Monday'>$ent_inter_checked</div>";
                              }
                              if ($ent_pop_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Tuesday'>$ent_pop_checked</div>";
                              }
                              if ($ent_acoustic_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Wednesday'>$ent_acoustic_checked</div>";
                              }
                              if ($ent_country_checked != '') {
                                echo "<div class='col-4 mr-2 mb-2 item'  value='Thursday'>$ent_country_checked</div>";
                              }
                              if ($ent_jazz_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Friday'>$ent_jazz_checked</div>";
                              }
                              if ($ent_rock_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Saturday'>$ent_rock_checked</div>";
                              }
                              if ($ent_rap_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Monday'>$ent_rap_checked</div>";
                              }
                              if ($ent_EDM_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Tuesday'>$ent_EDM_checked</div>";
                              }
                              if ($ent_folk_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Wednesday'>$ent_folk_checked</div>";
                              }
                              if ($ent_live_music_checked != '') {
                                echo "<div class='col-4 mr-2 mb-2 item'  value='Thursday'>$ent_live_music_checked</div>";
                              }
                              if ($ent_dj_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Friday'>$ent_dj_checked</div>";
                              }
                              if ($ent_indie_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Saturday'>$ent_indie_checked</div>";
                              }
                            ?>
                          </div> -->
                        
                      </div>
                    
<!--                     <a href="ChartJS.php" class="botton" style="color: darkblue;">
                      <button button type="button" class="bt">
                        Chart
                      </button>
                    </a> -->

                </div>
            </div>
            
        </div>
      </div>

      <?php } ?>
      
    

<!------------------------ MAP ------------------------>

<script>
    var map;
    var markers = [];

    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 9.121614189400937, lng: 99.35077404619464}, 
        zoom: 13
      });

      fetchMarkers();
    }

    function fetchMarkers() {
      // สร้าง URL โดยเพิ่ม survey_id เข้าไป
      const survey_id = <?php echo $survey_id; ?>;
      const url = `get_markers.php?survey_id=${survey_id}`;

      // ดึงข้อมูลหมุดจากฐานข้อมูล
      fetch(url)
        .then(response => response.json())
        .then(markers => {
          markers.forEach(marker => {
            addMarker(marker);
          });
        });
    }

    function addMarker(markerData) {
      var marker = new google.maps.Marker({
        position: {lat: parseFloat(markerData.ent_locationX), lng: parseFloat(markerData.ent_locationY)},
        map: map,
        title: markerData.ent_name
      });

      // เพิ่ม Event Listener สำหรับคลิกที่ Marker
      marker.addListener('click', function() {
        // สร้าง Popup เพื่อแสดงชื่อสถานที่
        var infowindow = new google.maps.InfoWindow({
          content: markerData.ent_name
        });
        // แสดง Popup ที่ตำแหน่งของ Marker
        infowindow.open(map, marker);

        // เก็บค่า Ent_id เมื่อคลิกที่ Marker
        var entId = markerData.Ent_id;
        // นำค่า Ent_id ไปใช้งานต่อได้ตามต้องการ
        console.log("Ent_id: " + entId);
      });

      markers.push(marker);
    }
</script>



  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIBZLpGDwASIYwXIC4WM-qVcP76mFr6Bo&callback=initMap&language=th"></script>

<?php  
  
}else
echo "<meta http-equiv=\"Refresh\" content=\"0; url=../Login.php\">";
?>

<script>
    if ( window.history.replaceState ) {
	    window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>
