<?php

session_start();
include "../ConfigDB.php";
$group_id = $_GET['group_id'];
$userid = $_GET['user_id'];
$survey_id = $_GET['survey_id'];

?>
<html>
    <head>
    <title>Vote</title>
    <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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
        width: 300px;
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


      .bottom-right2 {
        width: 300px;
        bottom: 30px;
        right: 30px;
        border-radius: 32px;
        background: gray;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.75));
      }

      .bottom-right2:hover {
        font-weight: bold;
        background: darkgray;
      }

      .inputlocation{
            padding: 5px;
            width: 50%;
          }
          #map {
            height: 430px;
            width: 600px;
            margin: 40px;
          }

          #BoxTextRight {
            height: 30px;
            width: 60px;
            margin: 40px;
          }
          .img{
            height: 350px;
            width: 530px;
            margin: 0 30px 30px 0;
            overflow: hidden;
            border: solid 1px gray;
          }

          .star{
            font-size: 50px;
          }
      </style>
        <title>5 Star Rating system with jQuery, AJAX, and PHP</title>

        <!-- CSS -->
        <link href="VoteStyle.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link href='jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
        
        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(function() {
            $('.rating').barrating({
                theme: 'fontawesome-stars',
                onSelect: function(value, text, event) {

                    // Get element id by data-id attribute
                    var el = this;
                    var el_id = el.$elem.data('id');
                    var group_id =document.getElementById("group_id").value;
                    var userid =document.getElementById("userid").value;
                    var survey_id =document.getElementById("survey_id").value;


                    // rating was selected by a user
                    if (typeof(event) !== 'undefined') {
                        
                        var split_id = el_id.split("_");
                        var Ent_id = split_id[1];  // postid
                        console.log(group_id);
                        console.log(userid);
                        console.log(survey_id);
                        // AJAX Request
                        $.ajax({
                          
                            url: 'Rating_ajax.php',
                            type: 'post',
                            data: {Ent_id:Ent_id, rating:value, group_id:group_id, userid:userid, survey_id:survey_id},
                            dataType: 'json',
                            success: function(data){console.log("hi");
                              console.log(data);
                                // Update average
                                var rating = data['rating'];
                                $('#avgrating_'+Ent_id).text(rating);
                            }
                        });
                    }
                }
            });
        });
      
        </script>
    </head>
    <body style="background:#F5F5F5;">
    <?php
if($_SESSION['usertype_id']=="2"){
    include("MenuBar.php"); ?>
      <input type="hidden" id="group_id" value="<?php echo $group_id; ?>">
      <input type="hidden" id="userid" value="<?php echo $userid; ?>">
      <input type="hidden" id="survey_id" value="<?php echo $survey_id; ?>">
      
        <div  >
            <p style='color:#F07028 ; margin-left:10%; font-size:60px;'>ลงคะแนนเลือกร้าน</p>
            <?php
            $query = "SELECT * FROM `rank` WHERE survey_id = $survey_id";
            $result = mysqli_query($conn,$query);
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

                $query = "SELECT * 
                FROM `entertainment` 
                WHERE Ent_id IN ($Ent_id1, $Ent_id2, $Ent_id3) 
                ORDER BY FIELD(Ent_id, $Ent_id1, $Ent_id2, $Ent_id3);
                ";
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($result)){
                  $lat = (isset($row['ent_locationX']) ? $row['ent_locationX'] : 9.1129);
                  $lng = (isset($row['ent_locationY']) ? $row['ent_locationY'] : 99.3109);

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
                  

                    $Ent_id = $row['Ent_id'];
                    $ent_name = $row['ent_name'];
                    $ent_description = $row['ent_description'];
                    $ent_address = $row['ent_address'];

                    /* $sql = "SELECT * FROM entdrink
                    WHERE Ent_id = '$Ent_id';";
                    $resultDrink = $conn->query($sql);

                    $drink_id = array();
                    $i = 0;
                    if($resultDrink){
                        if($resultDrink->num_rows > 0) {
                            while($dbarr = $resultDrink->fetch_array())                                
                                $drink_id[$i++] = $dbarr['drink_id'];
                        }
                    }

                    $sql = "SELECT * FROM drink;";
                    $resultDrink2 = $conn->query($sql);
                    if($resultDrink2->num_rows > 0) {
                        while ($dbarr = $resultDrink2->fetch_array()){
                            echo "<tr><td>";
                            echo "<input class='mr-2 mt-1' type='checkbox' name='drink[]' value='".$dbarr['drink_id']."' ";
                            if(in_array($dbarr['drink_id'],$drink_id))
                                echo " checked >";
                            else echo ">";
                            echo "<label class=''>".$dbarr['drink_name'];
                            echo "<span class='checkmark'></span>";
                            echo "</label>";
                            echo "</td></tr>";
                        }
                    } */
                    

                    // User rating
                    $query = "SELECT * FROM post_rating WHERE Ent_id=".$Ent_id." 
                    and userid=".$userid." and survey_id =$survey_id";
                    $userresult = mysqli_query($conn,$query) or die;
                    $fetchRating = mysqli_fetch_array($userresult);
                    $rating = null;
                    if ($fetchRating !== null) {
                        $rating = $fetchRating['rating'];
                    }

            ?>
                  <div class="post">
    <div class="box  mt-5" style="width:80%; background:#fff;
        border-radius: 15px;  margin-left:10%;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
        <div class="box2 d-flex">
            <div class="MapLeft mt-3" style="margin-left:8%;">
                <h1 style=" color: #405A7D;"><?php echo $ent_name ?></h1>  
                <div class="mb-3">
                    <h1 style="text-indent: 30px; margin:0 8% 0 0; font-size:16px;"><?php echo $ent_description ?></h1>
                </div>
                <div id="carouselExample<?php echo $Ent_id; ?>" class="carousel slide img">
                    <div class="carousel-inner">
                        <?php 
                        $query2 = "SELECT * FROM entimg WHERE ent_id = $Ent_id";
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?php echo $Ent_id; ?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?php echo $Ent_id; ?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

                      
                    <div class="BoxTextRight" style="background:#fff; margin-top:6%;  margin-right:4%;">
                    
                    <div class="row dd d-flex" style="  background:#fff; 
                        border-radius: 15px; border: 4px solid #B8B8B8; padding: 20px; margin: auto; ">
                      
                      <div class="top col-3">
                          <h1 style=" font-size:16px;">ที่อยู่ :</h1>
                        </div>
                      <div class="col-9">
                        <div class='item mb-2 mr-1 ml-1' style='text-align: left; padding:10px;'><?php echo $ent_address ?></div>
                      </div>

                        <div class="top col-3">
                          <h1 style="font-size:16px;">เวลา :</h1>
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
                                echo "<div class='col-4 mr-1 ml-1  mb-2 item'>$ent_thursday_checked</div>";
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

                          <div class="top col-3">
                              <h1 style=" font-size:16px;">เพลง :</h1>
                          </div>
                          <div class="col-9 row" style="margin:auto;">
                          <?php
                              if ($ent_inter_checked != '') {
                                echo "<div class='col-2 mr-1 ml-1 mb-2 item'  value='Monday'>$ent_inter_checked</div>";
                              }
                              if ($ent_pop_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'  value='Tuesday'>$ent_pop_checked</div>";
                              }
                              if ($ent_acoustic_checked != '') {
                                echo "<div class='col-4 mr-1 ml-1 mb-2 item'  value='Wednesday'>$ent_acoustic_checked</div>";
                              }
                              if ($ent_country_checked != '') {
                                echo "<div class='col-4 mr-1 ml-1 mb-2 item'  value='Thursday'>$ent_country_checked</div>";
                              }
                              if ($ent_jazz_checked != '') {
                                echo "<div class='col-2 mr-1 ml-1 mb-2 item'  value='Friday'>$ent_jazz_checked</div>";
                              }
                              if ($ent_rock_checked != '') {
                                echo "<div class='col-2 mr-1 ml-1 mb-2 item'  value='Saturday'>$ent_rock_checked</div>";
                              }
                              if ($ent_rap_checked != '') {
                                echo "<div class='col-2 mr-1 ml-1 mb-2 item'  value='Monday'>$ent_rap_checked</div>";
                              }
                              if ($ent_EDM_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'  value='Tuesday'>$ent_EDM_checked</div>";
                              }
                              if ($ent_folk_checked != '') {
                                echo "<div class='col-4 mr-1 ml-1 mb-2 item'  value='Wednesday'>$ent_folk_checked</div>";
                              }
                              if ($ent_live_music_checked != '') {
                                echo "<div class='col-4 mr-1 ml-1 mb-2 item'  value='Thursday'>$ent_live_music_checked</div>";
                              }
                              if ($ent_dj_checked != '') {
                                echo "<div class='col-2 mr-1 ml-1 mb-2 item'  value='Friday'>$ent_dj_checked</div>";
                              }
                              if ($ent_indie_checked != '') {
                                echo "<div class='col-3 mr-1 ml-1 mb-2 item'  value='Saturday'>$ent_indie_checked</div>";
                              }
                            ?>
                          </div>
                        
                      </div>

                      <div>
                        <div class="row post-action mt-2">
                            <!-- Rating -->
                            <select class='col-8 rating' id='rating_<?php echo $Ent_id; ?>' data-id='rating_<?php echo $Ent_id; ?>'>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                                <option value="5" >5</option>
                            </select>
                            <div class="mt-2" style='clear: both;'></div>
                            <div class="col-4" style="font-size:20px">Rating is: <span id='avgrating_<?php echo $Ent_id; ?>'><?php echo $rating; ?></span> /5</div>

                            <!-- Set rating -->
                            <script type='text/javascript'>
                            $(document).ready(function(){
                                $('#rating_<?php echo $Ent_id; ?>').barrating('set',<?php echo $rating; ?>);
                            });
                    
                            </script>
                        </div>
                    </div>
      </div>
    </div>
    </div>



            <?php
                }
            ?>
                <a href="MainGroup.php?group_id=<?php echo $group_id; ?>">
    <button style="border-radius: 15px; margin: 50px 35% ; text-align:center;
                    color: #FFF; padding: 15px 20px; padding-bottom: 20px;
                    font-size:20px;
                    width: 420px;
                    background: #F07028; 
                    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25), -7px -6px 4px 0px
                    rgba(0, 0, 0, 0.25) inset; "> ยืนยัน </button>
  </div></a>
</div>


<script>
  function initMap() {
    var myLatLng = {lat: 9.094193722320973, lng: 99.35661792755127};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: myLatLng
    });

    document.getElementById("lat").value = 9.094193722320973;
    document.getElementById("lng").value = 99.35661792755127;

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Click or Drag to get Latitude and Longitude',
      draggable: true  // Make the marker draggable
    });

	var provinceInput = document.getElementById('provinceInput');

    // Initial reverse geocoding
    reverseGeocode(marker.getPosition());


    // Add a click event listener to the map
    google.maps.event.addListener(map, 'click', function(event) {
      updateMarker(event.latLng, marker);
      marker.setPosition(event.latLng);
      reverseGeocode(event.latLng);

    });

    // Add a drag event listener to the marker
    google.maps.event.addListener(marker, 'dragend', function(event) {
      updateMarker(event.latLng, marker);
      var newMarkerPosition = marker.getPosition();
      reverseGeocode(newMarkerPosition);

    });

    function reverseGeocode(location) {
      var geocoder = new google.maps.Geocoder();

      geocoder.geocode({ 'location': location }, function(results, status) {
        if (status === 'OK') {
          if (results[0]) {
            var addressComponents = results[0].address_components;
            var province = findAddressComponent(addressComponents, 'administrative_area_level_1');

            if (province) {
              var provinceName = province.long_name;
              provinceInput.value = provinceName;
            } else {
              provinceInput.value = 'Unknown';
            }
          } else {
            provinceInput.value = 'Unknown';
          }
        } else {
          console.log('Geocoder failed due to:', status);
          provinceInput.value = 'Unknown';
        }
      });
    }

    function findAddressComponent(components, type) {
      for (var i = 0; i < components.length; i++) {
        for (var j = 0; j < components[i].types.length; j++) {
          if (components[i].types[j] === type) {
            return components[i];
          }
        }
      }
      return null;
    }


    // Function to update the marker and log the coordinates
    function updateMarker(latLng, marker) {
      marker.setPosition(latLng);
      console.log('Latitude: ' + latLng.lat(), 'Longitude: ' + latLng.lng());
      document.getElementById("lat").value = latLng.lat();
      document.getElementById("lng").value = latLng.lng();
    }
  }
</script>

<!-- Include the Google Maps JavaScript API with your API key -->

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIBZLpGDwASIYwXIC4WM-qVcP76mFr6Bo&callback=initMap&language=th">
</script>
<?php 
}else
echo "<meta http-equiv=\"Refresh\" content=\"1; url=../Login.php\">";
?>
<script>
    if ( window.history.replaceState ) {
	    window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>
