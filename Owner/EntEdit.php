<?php session_start(); ?>
<?php include('../ConfigDB.php');?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <title>Edit Shop</title>
  <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Untitled Document</title>
  <link href="css/main.css" rel="stylesheet" type="text/css" />
  <style>
    .inputlocation{
      padding: 5px;
      width: 50%;
    }
    #map {
      height: 500px;
      width: 1000px;
      margin: 40px;
    }
  </style>

  </head>
  <style>
    input[type="text"] {
      background-color: #FFFFFF;
      color: #000000;
      font-size: 16px;
      margin-top: 5px;
      padding-bottom: 5px;
      padding-left: 5px;
      border-radius: 5px;
      cursor: pointer;
      border-radius: 8px;
      border: 1px solid #828282;
      background: #F5F5F5;
      box-shadow: inset 0px -2px 4px 1px rgba(0, 0, 0, 0.25);
    }

    td {
        margin-bottom: 5%;
        padding-left: 3%;
        
    }

    input[type="submit"] {
    background-color: #F07028;
    width: 15%;
    color: #fff;
    cursor: pointer;
    border-radius: 5px; /* ขอบมนสำหรับปุ่ม submit */
    border: none; /* ลบเส้นขอบ */
    margin-right: 10px;
    margin-top: 20px;
    margin-bottom: 15px;
    padding: 8px 30px; /* ปรับขนาด padding เพื่อทำให้ปุ่มใหญ่ขึ้น */
    font-size: 16px; /* ปรับขนาดตัวอักษร */
    }

    .reset {
    background-color: #828282;
    color: #fff;
    cursor: pointer;
    border-radius: 5px; /* ขอบมนสำหรับปุ่ม submit */
    border: none; /* ลบเส้นขอบ */
    margin-left: 10px;
    margin-top: 20px;
    margin-bottom: 15px;
    padding: 8px 70px; /* ปรับขนาด padding เพื่อทำให้ปุ่มใหญ่ขึ้น */
    font-size: 16px; /* ปรับขนาดตัวอักษร */
    }

   

  </style>

  <body style="background-color:#FDF8F4;">
  <?php
    if($_SESSION['usertype_id']=="1"){
        include("EntMenuBar.php");
    ?>

    <h1 class="top mt-5" style=" font-size: 20px; color: #F07028;
              font-family: Inter;
              font-size: 50px; padding-left: 10%;
              font-style: normal;
              font-weight: 700;
              line-height: normal;">แก้ไขข้อมูลร้าน</h1>

  
  <?php
    echo "<div id='content-container'>";    
    $submit = (isset($_POST['submit']) ? $_POST['submit'] : '');
    if ($submit == '') {
        $id = (isset($_GET['Ent_id']) ? $_GET['Ent_id'] : '');
        if($id != ''){
            //echo "<a href=managestd.php>กลับหน้าจอการแก้ไขข้อมูล</a><br>";
            //echo "<a href=index.php>กลับไปเมนูผู้ดูแลระบบ</a><p>";
        require("../ConfigDB.php");
        $sql = "USE zbvfpszw_group_recommen";
        $conn->query($sql);
        $sql = "SELECT * FROM entertainment WHERE Ent_id = '$id';";

        //echo $sql;
        
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $dbarr = $result->fetch_array();

            echo "<form action='' method='post' enctype='multipart/form-data'>";
            echo "<div class='mt-5' style='
            padding: 12px 12px 12px 24px; border-collapse: collapse; border-radius: 15px; margin-top: 1%;
            border-radius: 15px; width: 80%; margin:auto;
            border: 0px solid #000; 
            background: #FFF; 
            box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25)'>";
            echo "<table>";
            echo "<tr><td style='padding: 5px;'> ชื่อร้าน </td>";
            echo "<input type=hidden name=id value = '$id'>";
            echo "<td><input type=text name=Ename value='$dbarr[ent_name]'></td></tr>";
            echo "<tr><td style='padding: 5px;'> ที่อยู่ </td>";
            echo "<td><input type=text style='width: 500px;' name=address value='$dbarr[ent_address]'></td></tr>";
            echo "<tr><td style='padding: 5px;'> เปิด </td>";
            echo "<td><input type=time name=timeOpen value='$dbarr[ent_timeOpen]'></td></tr>";
            echo "<tr><td style='padding: 5px;'> ปิด </td>";
            echo "<td><input type=time name=timeClose value='$dbarr[ent_timeClose]'></td></tr>";
            echo "<tr><td style='padding: 5px;'> คำอธิบายร้าน </td>";
            echo "<td><input type=text style='width: 500px;' name=description value='$dbarr[ent_description]'></td></tr>";
          
            
            $ent_monday_checked = ($dbarr['ent_monday'] == 1) ? 'checked' : '';
            $ent_tuesday_checked = ($dbarr['ent_tuesday'] == 1) ? 'checked' : '';
            $ent_wednesday_checked = ($dbarr['ent_wednesday'] == 1) ? 'checked' : '';
            $ent_thursday_checked = ($dbarr['ent_thursday'] == 1) ? 'checked' : '';
            $ent_friday_checked = ($dbarr['ent_friday'] == 1) ? 'checked' : '';
            $ent_saturday_checked = ($dbarr['ent_saturday'] == 1) ? 'checked' : '';
            $ent_sunday_checked = ($dbarr['ent_sunday'] == 1) ? 'checked' : '';
            
            echo "<tr><td><br>วันเปิดร้าน</td></tr>";
            echo "<br>";
            echo "<tr><td><input type='checkbox' name='days[]' value='Monday' $ent_monday_checked> จันทร์</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='days[]' value='Tuesday' $ent_tuesday_checked> อังคาร</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='days[]' value='Wednesday' $ent_wednesday_checked> พุธ</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='days[]' value='Thursday' $ent_thursday_checked> พฤหัสบดี</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='days[]' value='Friday' $ent_friday_checked> ศุกร์</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='days[]' value='Saturday' $ent_saturday_checked> เสาร์</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='days[]' value='Sunday' $ent_sunday_checked> อาทิตย์</label><br></td></tr>";


            //$lat = $dbarr['Lat'];
            //$lng = $dbarr['Lng'];
            
            $lat = (isset($dbarr['ent_locationX']) ? $dbarr['ent_locationX'] : 9.1129);
            $lng = (isset($dbarr['ent_locationY']) ? $dbarr['ent_locationY'] : 99.3109);
            /* $province = (isset($dbarr['Province']) ? $dbarr['Province'] : ''); */

            echo "</table></div>";
          
            echo "
            <table style='border-radius: 15px;  
            border-radius: 15px; width: 80%;   
            margin-top:0px;
            margin-bottom: 15px; margin:auto;
            border: 0px solid #000; 
            background: #FFF; 
            box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25);'>";

            $ent_pub_checked = ($dbarr['pub'] == 1) ? 'checked' : '';
            $ent_bar_checked = ($dbarr['bar'] == 1) ? 'checked' : '';
            $ent_indoor_checked = ($dbarr['indoor'] == 1) ? 'checked' : '';
            $ent_outdoor_checked = ($dbarr['outdoor'] == 1) ? 'checked' : '';
            $ent_cocktail_bar_checked = ($dbarr['cocktail_bar'] == 1) ? 'checked' : '';
            $ent_restaurant_checked = ($dbarr['restaurant'] == 1) ? 'checked' : '';

    
            echo "<tr><td><br><div> ประเภทร้าน </div></td></tr>";
            echo "<br>";
            echo "<tr><td><input type='checkbox' name='type[]' value='pub' $ent_pub_checked> ผับ</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='type[]' value='bar' $ent_bar_checked> บาร์</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='type[]' value='indoor' $ent_indoor_checked> indoor</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='type[]' value='outdoor' $ent_outdoor_checked> outdoor</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='type[]' value='cocktail_bar' $ent_cocktail_bar_checked> cocktail bar</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='type[]' value='restaurant' $ent_restaurant_checked> restaurant</label><br></td></tr>";

            $ent_vintage_checked = ($dbarr['vintage'] == 1) ? 'checked' : '';
            $ent_minimal_checked = ($dbarr['minimal'] == 1) ? 'checked' : '';
            $ent_modern_checked = ($dbarr['modern'] == 1) ? 'checked' : '';
            $ent_camp_checked = ($dbarr['camp'] == 1) ? 'checked' : '';
            $ent_thai_ban_checked = ($dbarr['thai_ban'] == 1) ? 'checked' : '';
            $ent_luk_thung_checked = ($dbarr['luk_thung'] == 1) ? 'checked' : '';

    
            echo "<tr><td><br> สไตล์ร้าน </td></tr>";
            echo "<br>";
            echo "<tr><td><input type='checkbox' name='style[]' value='Vintage' $ent_vintage_checked> วินเทจ</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='style[]' value='Minimal' $ent_minimal_checked> มินิมอล</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='style[]' value='Modern' $ent_modern_checked> โมเดิร์น</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='style[]' value='Camp' $ent_camp_checked> แคมป์</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='style[]' value='Thai_Ban' $ent_thai_ban_checked> ไทบ้าน</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='style[]' value='Luk_Thung' $ent_luk_thung_checked> ลูกทุ่ง</label><br></td></tr>";

            $ent_inter_checked      = ($dbarr['inter'] == 1) ? 'checked' : '';
            $ent_pop_checked        = ($dbarr['pop'] == 1) ? 'checked' : '';
            $ent_acoustic_checked   = ($dbarr['acoustic'] == 1) ? 'checked' : '';
            $ent_country_checked    = ($dbarr['country'] == 1) ? 'checked' : '';
            $ent_jazz_checked       = ($dbarr['jazz'] == 1) ? 'checked' : '';
            $ent_rock_checked       = ($dbarr['rock'] == 1) ? 'checked' : '';
            $ent_rap_checked        = ($dbarr['rap'] == 1) ? 'checked' : '';
            $ent_EDM_checked        = ($dbarr['EDM'] == 1) ? 'checked' : '';
            $ent_folk_checked       = ($dbarr['folk'] == 1) ? 'checked' : '';
            $ent_live_music_checked = ($dbarr['live_music'] == 1) ? 'checked' : '';
            $ent_dj_checked         = ($dbarr['dj'] == 1) ? 'checked' : '';
            $ent_indie_checked      = ($dbarr['indie'] == 1) ? 'checked' : '';
            
    
            echo "<tr><td><br> ประเภทดนตรี </div></td></tr>";
            echo "<br>";
            echo "<tr><td><input type='checkbox' name='music[]' value='inter' $ent_inter_checked> สากล</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='pop' $ent_pop_checked> ป็อป</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='acoustic' $ent_acoustic_checked> อคูสติก</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='country' $ent_country_checked> เพื่อชีวิต</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='jazz' $ent_jazz_checked> แจ๊ส</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='rock' $ent_rock_checked> ร็อค</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='rap' $ent_rap_checked> แร็พ</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='EDM' $ent_EDM_checked> EDM</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='folk' $ent_folk_checked> โฟล์คซอง</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='live_music' $ent_live_music_checked> ดนตรีสด</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='dj' $ent_dj_checked> เปิดเพลง</label><br></td></tr>";
            echo "<tr><td><input type='checkbox' name='music[]' value='indie' $ent_indie_checked> อินดี้</label><br></td></tr>";


        echo "<tr><td><div class='mt-3 '>ประเภทเครื่องดื่ม</div></td></tr>";
        }

        $sql = "SELECT * FROM entdrink
                WHERE Ent_id = '$id';";
        $result = $conn->query($sql);

        $drink_id = array();
        $i = 0;
        if($result){
            if($result->num_rows > 0) {
                while($dbarr = $result->fetch_array())                                
                    $drink_id[$i++] = $dbarr['drink_id'];
            }
        }

        $sql = "SELECT * FROM drink;";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while ($dbarr = $result->fetch_array()){
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
        }

      echo "<form action='' method='post' enctype='multipart/form-data'>";

      echo "<table>";
      
      // คำสั่ง SQL
      $query = "SELECT * FROM entimg WHERE ent_id = '$id'";
      $result = mysqli_query($conn, $query);
      
      // ตรวจสอบผลลัพธ์
      if (!$result) {
          die("Error: " . mysqli_error($conn));
      }
      
      // แสดงรูปภาพทั้งหมด
      while ($row1 = mysqli_fetch_array($result)) {
        $imgID = $row1['entImg_id'];
        echo '<td>img</td>';
        echo '<td><label for="img"></label>';
        echo '<input type="file" name="img[]" multiple value="' . $row1['entImg_path'] . '" /><br/>';
        echo '<span class="form-group"><img src="../img/EntImg/'. $row1['entImg_path'] .'" width="120" height="120" class="rounded" />';
        echo '<input name="file1[]" type="hidden" id="file1" value="' . $row1['entImg_path'] . '" />';
        echo '</span></td>';
    }
    
    echo "</table></div>";
    echo "<div class='mt-4' style='padding: 12px 12px 12px 24px; border-collapse: collapse; border-radius: 15px; margin-top: 1%; border-radius: 15px; width: 80%; margin-bottom: 15px; margin:auto; border: 0px solid #000; background: #FFF; box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25)'>";
    echo "<tr><td><div class='mt-5'>พิกัดร้าน</div></td></tr>";
    echo "<tr><td>ละติจูด</td><td><input id='lat' type='text' name='lat' value='$lat'></td></tr>";
    echo "<tr><td>ลองติจูด</td><td><input id ='lng' type='text' name='lng' value='$lng'></td></tr>";
    echo "<center>";
    echo "<div id='map' ></div>";
    echo "</center></div>";
    
    echo "<center>";
    echo "<div style='width: 80%'>";
    echo "<input type='hidden' name='ent_id' value='$id'>";
    echo "<input class='button' type='submit' name='submit' value='อัปเดต'>&nbsp;";
    echo "<a href='EntHome.php' class='reset'>ยกเลิก</a>";
    echo "</div></center></table></form>";

        $conn->close();
?>

<!-- google map start -->


<script>
  function initMap() {
    let defaultLat = parseFloat(document.getElementById("lat").value);
    let defaultLng = parseFloat(document.getElementById("lng").value);

    var myLatLng = {lat: defaultLat, lng: defaultLng};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
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


<!-- google map stop -->
<?php
    }else 
    echo "<meta http-equiv=\"Refresh\" content=\"1; url=index.php\">";
}else{
  require("../ConfigDB.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (isset($_POST['id']) ? $_POST['id'] : ''); 
    $targetDirectory = "../img/EntImg/";

    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }
}

	$sql = "USE zbvfpszw_group_recommen";
	$conn->query($sql);

  
   // ส่วนของการเพิ่มข้อมูลรูปภาพ
  // Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
  date_default_timezone_set('Asia/Bangkok');

  
  // สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
  $date1 = date("Ymd_his");
  
  // สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อซ้ำกัน
  $numrand = (mt_rand());
  
  // รับชื่อไฟล์เดิมจากฟอร์ม
  $files = isset($_POST['files']) ? $_POST['files'] : [];
  
  // รับชื่อไฟล์ที่เลือกใหม่จากฟอร์ม
  $uploads = $_FILES['img']['name'];
  
  // โฟลเดอร์ที่เก็บไฟล์
  $path = "../img/EntImg/";
  
  // ตรวจสอบแต่ละไฟล์ที่เลือกใหม่
  foreach ($uploads as $key => $upload) {
    if ($upload <> '') {
        // ตัวขื่อกับนามสกุลภาพออกจากกัน
        $type = strrchr($upload, ".");

        // ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
        $newname = $numrand . $date1 . $key . $type;

        $path_copy = $path . $newname;
        $path_file_img = "../img/EntImg/" . $newname;

        // คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES['img']['tmp_name'][$key], $path_copy);

        // อัปเดตข้อมูลในฐานข้อมูล
        $old_name = isset($files[$key]) ? $files[$key] : '';
        $sql = "UPDATE entimg SET entImg_path = '$newname' WHERE entImg_path = '$old_name';";
        $conn->query($sql);

        error_reporting(E_ALL);
ini_set('display_errors', 1);


    }
}
	  $Ename = (isset($_POST['Ename']) ? $_POST['Ename'] : '');
	  $address = (isset($_POST['address']) ? $_POST['address'] : '');
    $open = (isset($_POST['timeOpen']) ? $_POST['timeOpen'] : '');
    $close = (isset($_POST['timeClose']) ? $_POST['timeClose'] : '');
    $description = (isset($_POST['description']) ? $_POST['description'] : '');

	$lat = (isset($_POST['lat']) ? $_POST['lat'] : 0);
	$lng = (isset($_POST['lng']) ? $_POST['lng'] : 0);
  $stdid = (isset($_POST['id']) ? $_POST['id'] : ''); 

  if(isset($_POST['music'])) {
    $music = $_POST['music'];

    // สร้างตัวแปรเพื่อเก็บค่าสำหรับแต่ละวัน
    $inter = in_array('inter', $music) ? 1 : 0;
    $pop = in_array('pop', $music) ? 1 : 0;
    $acoustic = in_array('acoustic', $music) ? 1 : 0;
    $country = in_array('country', $music) ? 1 : 0;
    $jazz = in_array('jazz', $music) ? 1 : 0;
    $rock = in_array('rock', $music) ? 1 : 0;
    $rap = in_array('rap', $music) ? 1 : 0;
    $EDM = in_array('EDM', $music) ? 1 : 0;
    $folk = in_array('folk', $music) ? 1 : 0;
    $live_music = in_array('live_music', $music) ? 1 : 0;
    $dj = in_array('dj', $music) ? 1 : 0;
    $indie = in_array('indie', $music) ? 1 : 0;
}

if(isset($_POST['type'])) {
  $type = $_POST['type'];

  // สร้างตัวแปรเพื่อเก็บค่าสำหรับแต่ละวัน
  $pub = in_array('pub', $type) ? 1 : 0;
  $bar = in_array('bar', $type) ? 1 : 0;
  $indoor = in_array('indoor', $type) ? 1 : 0;
  $outdoor = in_array('outdoor', $type) ? 1 : 0;
  $cocktail_bar = in_array('cocktail_bar', $type) ? 1 : 0;
  $restaurant = in_array('restaurant', $type) ? 1 : 0;
}

if(isset($_POST['style'])) {
  $style = $_POST['style'];

  // สร้างตัวแปรเพื่อเก็บค่าสำหรับแต่ละวัน
  $Vintage = in_array('Vintage', $style) ? 1 : 0;
  $Minimal = in_array('Minimal', $style) ? 1 : 0;
  $Modern = in_array('Modern', $style) ? 1 : 0;
  $Camp = in_array('Camp', $style) ? 1 : 0;
  $Thai_Ban = in_array('Thai_Ban', $style) ? 1 : 0;
  $Luk_Thung = in_array('Luk_Thung', $style) ? 1 : 0;
}


  if(isset($_POST['days'])) {
    $days = $_POST['days'];

    // สร้างตัวแปรเพื่อเก็บค่าสำหรับแต่ละวัน
    $ent_monday = in_array('Monday', $days) ? 1 : 0;
    $ent_tuesday = in_array('Tuesday', $days) ? 1 : 0;
    $ent_wednesday = in_array('Wednesday', $days) ? 1 : 0;
    $ent_thursday = in_array('Thursday', $days) ? 1 : 0;
    $ent_friday = in_array('Friday', $days) ? 1 : 0;
    $ent_saturday = in_array('Saturday', $days) ? 1 : 0;
    $ent_sunday = in_array('Sunday', $days) ? 1 : 0;
  }

  
	$sql = "UPDATE entertainment SET ent_name='$Ename'
  ,ent_address='$address'
  ,ent_timeOpen='$open'
  ,ent_timeClose='$close'
  ,ent_locationX = '$lat'
  ,ent_locationY = '$lng'
  ,ent_monday = $ent_monday
  ,ent_tuesday = $ent_tuesday
  ,ent_wednesday = $ent_wednesday
  ,ent_thursday = $ent_thursday
  ,ent_friday = $ent_friday
  ,ent_saturday = $ent_saturday
  ,ent_sunday = $ent_sunday
  ,ent_description = '$description'
  ,inter = '$inter'
  ,pop = '$pop'
  ,acoustic = '$acoustic'
  ,country = '$country'
  ,jazz = '$jazz'
  ,rock = '$rock'
  ,rap = '$rap'
  ,EDM = '$EDM'
  ,folk = '$folk'
  ,live_music = '$live_music'
  ,	dj = '$dj'
  ,indie = '$indie'
  ,pub = '$pub'
  ,bar = '$bar'
  ,indoor = '$indoor'
  ,outdoor = '$outdoor'
  ,cocktail_bar = '$cocktail_bar'
  ,restaurant = '$restaurant'
  ,vintage = '$Vintage'
  ,minimal = '$Minimal'
  ,modern = '$Modern'
  ,camp = '$Camp'
  ,thai_ban = '$Thai_Ban'
  ,luk_thung = '$Luk_Thung'
  where Ent_id=$stdid";

	if ($conn->query($sql) === TRUE) {
		echo "<center><br>แก้ไขข้อมูลสำเร็จ<br></center>";
	} else {
		echo "<br>ไม่สามารถแก้ไขข้อมูลได้ : ".$conn->error;
	}


//////////////  update career student  /////////////
$drink = array();
$drink = (isset($_POST['drink']) ? $_POST['drink'] : '');

$sql = "DELETE FROM entdrink WHERE Ent_id = '$stdid';";
$conn->query($sql);

if($drink != ''){
    foreach($drink as $drink_id){
        $sql = "INSERT INTO entdrink VALUES
                (0,$drink_id,'$stdid')";
        $conn->query($sql);
    }
}

	$conn->close();
   echo "<meta http-equiv=\"Refresh\" content=\"2; url=EntHome.php\">";
}

	////////////   content stop  //////////////////
	echo "</div>";


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