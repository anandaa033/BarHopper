<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.bt{
  border: none;
  color: white;
  padding: 10px 28px;
  font-size: 16px;
  cursor: pointer;
}
.item{
  border:solid 2px green;
  color:green;
  border-radius:15px;  
  text-align: center;
  font-size: 14px;
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

    .star{
      font-size: 50px;
    }
</style>
<link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">
</head>
<body style="background:#FFFDF3;">
    <?php 
        require("../ConfigDB.php");
       
        $query ="SELECT Ent_id, SUM_Rating FROM ( SELECT Ent_id, SUM(`rating`) AS SUM_Rating 
                                                  FROM `post_rating` WHERE `survey_id` = $survey_id
                                                  GROUP BY `Ent_id` ) AS RatingSummary ORDER BY SUM_Rating DESC , Ent_id ASC LIMIT 1;";
        $result = mysqli_query($conn, $query); 
        $row = mysqli_fetch_array($result);
            $Ent_id = $row['Ent_id'];
            /* echo $row['SUM_Rating'];
            echo $Ent_id; */
            echo "<br>";

        
        $query ="SELECT * FROM entertainment WHERE Ent_id = $Ent_id";
        $result = mysqli_query($conn, $query); 
        $dbarr = $result->fetch_array(); 
            $ent_name = $dbarr['ent_name'];
            $ent_address = $dbarr['ent_address'];
            $ent_timeOpen = $dbarr['ent_timeOpen'];
            $ent_timeClose = $dbarr['ent_timeClose'];
            $ent_description = $dbarr['ent_description'];
            
            $lat = (isset($dbarr['ent_locationX']) ? $dbarr['ent_locationX'] : 9.1129);
            $lng = (isset($dbarr['ent_locationY']) ? $dbarr['ent_locationY'] : 99.3109);

                  $ent_timeOpen = $dbarr['ent_timeOpen'];
                  $ent_timeClose = $dbarr['ent_timeClose'];

                  $ent_monday_checked = ($dbarr['ent_monday'] == 1) ? 'จันทร์' : '';
                  $ent_tuesday_checked = ($dbarr['ent_tuesday'] == 1) ? 'อังคาร' : '';
                  $ent_wednesday_checked = ($dbarr['ent_wednesday'] == 1) ? 'พุธ' : '';
                  $ent_thursday_checked = ($dbarr['ent_thursday'] == 1) ? 'พฤหัสบดี' : '';
                  $ent_friday_checked = ($dbarr['ent_friday'] == 1) ? 'ศุกร์' : '';
                  $ent_saturday_checked = ($dbarr['ent_saturday'] == 1) ? 'เสาร์' : '';
                  $ent_sunday_checked = ($dbarr['ent_sunday'] == 1) ? 'อาทิตย์' : '';

                  $ent_pub_checked = ($dbarr['pub'] == 1) ? 'pub' : '';
                  $ent_bar_checked = ($dbarr['bar'] == 1) ? 'bar' : '';
                  $ent_indoor_checked = ($dbarr['indoor'] == 1) ? 'indoor' : '';
                  $ent_outdoor_checked = ($dbarr['outdoor'] == 1) ? 'outdoor' : '';
                  $ent_cocktail_bar_checked = ($dbarr['cocktail_bar'] == 1) ? 'cocktail_bar' : '';
                  $ent_restaurant_checked = ($dbarr['restaurant'] == 1) ? 'restaurant' : '';

                  $ent_vintage_checked = ($dbarr['vintage'] == 1) ? 'วินเทจ' : '';
                  $ent_minimal_checked = ($dbarr['minimal'] == 1) ? 'มินิมอล' : '';
                  $ent_modern_checked = ($dbarr['modern'] == 1) ? 'โมเดิร์น' : '';
                  $ent_camp_checked = ($dbarr['camp'] == 1) ? 'แคมป์' : '';
                  $ent_thai_ban_checked = ($dbarr['thai_ban'] == 1) ? 'ไทบ้าน' : '';
                  $ent_luk_thung_checked = ($dbarr['luk_thung'] == 1) ? 'ลูกทุ่ง' : '';

                  $ent_inter_checked      = ($dbarr['inter'] == 1) ? 'สากล' : '';
                  $ent_pop_checked        = ($dbarr['pop'] == 1) ? 'ป็อป' : '';
                  $ent_acoustic_checked   = ($dbarr['acoustic'] == 1) ? 'อะคูสติกส์' : '';
                  $ent_country_checked    = ($dbarr['country'] == 1) ? 'เพื่อชีวิต' : '';
                  $ent_jazz_checked       = ($dbarr['jazz'] == 1) ? 'แจ๊ส' : '';
                  $ent_rock_checked       = ($dbarr['rock'] == 1) ? 'ร็อค' : '';
                  $ent_rap_checked        = ($dbarr['rap'] == 1) ? 'แร็ป' : '';
                  $ent_EDM_checked        = ($dbarr['EDM'] == 1) ? 'EDM' : '';
                  $ent_folk_checked       = ($dbarr['folk'] == 1) ? 'โฟล์คซอง' : '';
                  $ent_live_music_checked = ($dbarr['live_music'] == 1) ? 'ดนตรีสด' : '';
                  $ent_dj_checked         = ($dbarr['dj'] == 1) ? 'dj' : '';
                  $ent_indie_checked      = ($dbarr['indie'] == 1) ? 'อินดี้' : '';
            ?>

            <div  id="bottomOfPage" class="box  mt-5" style=" background:#fff;
                                border-radius: 15px;
                                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
                            <div class="box2 d-flex" style="width:80%; margin:auto;">

                                <div class="MapLeft mt-5">
                                
                                
                                <div id="map" style=" margin-top: 1%;  "></div>
                                </div>

                    <div class="BoxTextRight " style=" width:100%; height: 320px; background:#fff; margin-top:2%;  margin-right:4%; ">
                    <h1 style="color: #405A7D; font-size:38px;"><?php echo $ent_name; ?></h1>  
                        <div class="mb-3">
                          <h1 style="text-indent: 30px; font-size:16px;"><?php echo	$ent_description?></h1>
                        </div>

                     <div class="row dd d-flex " style="  background:#fff; 
                        border-radius: 15px; border: 4px solid #B8B8B8; padding: 20px; margin: auto; ">
                        <div class="top col-3">
                          <h1 style=" font-size:16px;">ที่อยู่ :</h1>
                        </div>
                      <div class="col-9">
                        <div class='item mb-2 mr-1 ml-1' style='text-align: left; padding:10px;'><?php echo $ent_address ?></div>
                      </div>
                      
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

                          <div class="top col-3">
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
                                echo "<div class='col-4 mr-2 mb-2 item'  value='Wednesday'>$ent_acoustic_checked</div>";
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
                                echo "<div class='col-4 mr-2 mb-2 item'  value='Wednesday'>$ent_folk_checked</div>";
                              }
                              if ($ent_live_music_checked != '') {
                                echo "<div class='col-4 mr-2 mb-2 item'  value='Thursday'>$ent_live_music_checked</div>";
                              }
                              if ($ent_dj_checked != '') {
                                echo "<div class='col-2 mr-2 mb-2 item'  value='Friday'>$ent_dj_checked</div>";
                              }
                              if ($ent_indie_checked != '') {
                                echo "<div class='col-3 mr-2 mb-2 item'  value='Saturday'>$ent_indie_checked</div>";
                              }
                              echo "<input id='lat' type='hidden' name='lat' value='$lat'>";
                              echo "<input id ='lng' type='hidden' name='lng' value='$lng'>";
                              
                            ?>
                          </div>
                      </div>
                      
                                </div>
                                </div>
                            </div>
                            <div>


    <!-- google map start -->


<script>
  function initMap() {
    let defaultLat = parseFloat(document.getElementById("lat").value);
    let defaultLng = parseFloat(document.getElementById("lng").value);

    var myLatLng = {lat: defaultLat, lng: defaultLng};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: myLatLng
    });

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
        //document.getElementById("provinceInput").value = provinceInput.value;

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

<script>
window.onload = function() {
    // ตรวจสอบ URL หน้าเว็บ
    if (document.referrer !== "" && document.referrer !== window.location.href) {
        // หากโหลดมาจากลิงก์ที่ไม่ใช่หน้าแรก ให้เลื่อนหน้าลงมาด้านล่าง
        document.getElementById('bottomOfPage').scrollIntoView({ behavior: 'smooth', block: 'end' });
    }
};
</script>

</body>
</html>