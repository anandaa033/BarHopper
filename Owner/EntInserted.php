<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Shop</title>
  <link rel="website icon" type="png" href="../img/Logo/Logo-Project.png">

<link href="css/main.css" rel="stylesheet" type="text/css" />

<style>
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
      margin-top: 10px;
      margin-left: 10px;
      padding-bottom: 5px;
      padding-left: 10px;
      border-radius: 5px;
      cursor: pointer;
    }
    

    td {
        margin: 25px;
        padding-left: 3%;
       
    }

        input[type="submit"] {
    background-color: #176B87;
    color: #fff;
    cursor: pointer;
    border-radius: 5px; /* ขอบมนสำหรับปุ่ม submit */
    border: none; /* ลบเส้นขอบ */
    margin-top: 10px;
    margin-bottom: 15px;
    padding: 8px 30px; /* ปรับขนาด padding เพื่อทำให้ปุ่มใหญ่ขึ้น */
    font-size: 16px; /* ปรับขนาดตัวอักษร */
    }

        input[type="reset"] {
    background-color: #828282;
    color: #fff;
    cursor: pointer;
    border-radius: 5px; /* ขอบมนสำหรับปุ่ม submit */
    border: none; /* ลบเส้นขอบ */
    margin-top: 10px;
    margin-bottom: 15px;
    padding: 8px 30px; /* ปรับขนาด padding เพื่อทำให้ปุ่มใหญ่ขึ้น */
    font-size: 16px; /* ปรับขนาดตัวอักษร */
}
  </style>

<body style="background-color:#FDF8F4;">
<?php
if($_SESSION['usertype_id']=="1"){
	include("EntMenuBar.php");
	echo "<div id='content-container'>";
$send = (isset($_POST['send']) ? $_POST['send'] : '');
if ($send == '') {
?> 

	<form method="post" action="" enctype="multipart/form-data" style="margin-left: 10%;">
    <div class="contrainer">
	 <p class="topic mt-4" style=" font-size: 20px; color: #F07028;
              font-family: Inter;
              font-size: 50px;
              font-style: normal;
              font-weight: 700;
              line-height: normal;"> + เพิ่มข้อมูลร้าน</p>

  <div class="class="uplaodpic " style="border-radius: 15px;
              border: 0px solid #000;  width: 90%;
              background: #FFF; padding: 1%; padding-left: 2%;
              box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25);">
  <tr><td>อัปโหลดรูปภาพร้าน(ไม่เกิน 3 รูป)</td>
  <br>
  <td><input class="pic mt-2" type="file"name="images[]" multiple></td></tr>
        </div>  

  <div class="detail1 mt-4" style="border-radius: 15px;
              border: 0px solid #000;  width: 90%;
              background: #FFF; padding: 1%; padding-left: 2%;
              box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25)">
	  
    <tr><td class="top">ชื่อร้าน</td>
    <td><input type="text" name="name" style="border-radius: 8px;
                            border: 1px solid #828282;
                            background: #F5F5F5;
                            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);"></td></tr> <br>
		<tr><td>ที่อยู่</td>
    <td><input type="text" name="address"style="border-radius: 8px; 
                            width: 500px;
                            border: 1px solid #828282;
                            background: #F5F5F5;
                            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);"></td></tr>  <br>
		<tr><td>เวลาเปิด</td>
    <td><input type="time" name="open"style="border-radius: 8px;
                            padding:2px;
                            width: 200px;
                            border: 1px solid #828282;
                            background: #F5F5F5;
                            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);"></td></tr>  <br>
    <tr><td>เวลาปิด</td>
    <td><input type="time" name="close"style="
                            padding:2px;
                            width: 200px;
                            border-radius: 8px;
                            border: 1px solid #828282;
                            background: #F5F5F5;
                            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);"></td></tr> <br>
    <tr><td>คำอธิบาย</td>
    <td><input type="text" name="description" style="border-radius: 8px;
                            width: 500px;
                            border: 1px solid #828282;
                            background: #F5F5F5;
                            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);"></td></tr> <br>
    <td>วันที่ร้านเปิด</td> <br>
    <label><input type="checkbox" name="days[]" value="Monday"> จันทร์</label><br>
    <label><input type="checkbox" name="days[]" value="Tuesday"> อังคาร</label><br>
    <label><input type="checkbox" name="days[]" value="Wednesday"> พุธ</label><br>
    <label><input type="checkbox" name="days[]" value="Thursday"> พฤหัสบดี</label><br>
    <label><input type="checkbox" name="days[]" value="Friday"> ศุกร์</label><br>
    <label><input type="checkbox" name="days[]" value="Saturday"> เสาร์</label><br>
    <label><input type="checkbox" name="days[]" value="Sunday"> อาทิตย์</label><br>
		
 </div>

<table class='insertstudents mt-4 ' style="border-radius: 15px;  
              border-radius: 15px; width: 90%;   margin-bottom: 15px;
              border: 0px solid #000; 
              background: #FFF; 
              box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25);">


<?php
	require("../ConfigDB.php");

	$sql = "USE zbvfpszw_group_recommen";
	if(!$conn->query($sql))
		die("error ".$conn->error);	
    ?>	
    <tr><td><br>ประเภทร้าน</td></tr>
    <tr><td><label><input type="checkbox" name="type[]" value="pub"> ผับ</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="type[]" value="bar"> บาร์</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="type[]" value="indoor"> indoor</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="type[]" value="outdoor"> outdoor</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="type[]" value="cocktail_bar"> cocktail bar</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="type[]" value="restaurant"> restaurant</label><br></td></tr>


    <tr><td><br>สไตล์ร้าน</td></tr>
    <tr><td><label><input type="checkbox" name="style[]" value="Vintage"> วินเทจ</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="style[]" value="Minimal"> มินิมอล</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="style[]" value="Modern"> โมเดิร์น</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="style[]" value="Camp"> แคมป์</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="style[]" value="Thai_Ban"> ไทบ้าน</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="style[]" value="Luk_Thung"> ลูกทุ่ง</label><br></td></tr>

    <!-- <tr><td><br>ประเภทเครื่องดื่ม</td></tr>
<?php
	$sql = "SELECT * FROM drink;";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		while ($dbarr = $result->fetch_array()){
			echo "<tr><td>";
      echo "<input class='mr-2 mt-1' type='checkbox' name='drink[]' value='".$dbarr['drink_id']."'>";
			echo "<label class=''>".$dbarr['drink_name'];
			echo "<span class='checkmark'></span>";
			echo "</label>";
			echo "</td></tr>";
		}
	}
?>		 -->

</div>
    <tr><td><br>ประเภทดนตรี</td> </tr>
    <tr><td><label><input type="checkbox" name="music[]" value="inter"> สากล</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="pop"> ป็อป</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="acoustic"> อคูสติก</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="country"> เพื่อชีวิต</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="jazz"> แจ๊ส</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="rock"> ร็อค</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="rap"> แร็พ</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="EDM"> EDM</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="folk"> โฟล์คซอง</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="live_music"> ดนตรีสด</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="on_music"> เปิดเพลง</label><br></td></tr>
    <tr><td><label><input type="checkbox" name="music[]" value="indie"> อินดี้</label><br></td></tr>
 </table> 
 
  <div class="boxmap mt-4" style="border-radius: 15px; padding-bottom: 2px;
              border: 0px solid #000;  width: 90%;  padding-left: 2%;
              background: #FFF;  padding-left: 5%; 
              box-shadow: 5px 4px 13.5px 0px rgba(0, 0, 0, 0.25);">
    <td colspan="2" style=" color: #000000;  padding-top: 15px; padding-bottom: 15px; ">
    <h1 class="textmark " style="color: #F07028;
        font-family: Inter; 
        font-size: 48px;  padding-top: 3%;  padding-left: 2%;
        font-style: normal;
        font-weight: 700; 
        line-height: normal;">ที่ตั้งร้าน</h1>
  </td>
</tr>
		<div class="boxlatlng" style="padding-left: 5%; margin-top: 0%;"> <tr>
      <br>
      <td>ละติจูด</td>
      <td><input type="text" id="lat" name="lat"style="border-radius: 10px;
                  border: 1px solid #828282; 
                  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);"></td>
    </tr>
		 <tr>
      <td>ลองติจูด</d>
      <td><input type="text" id="lng" name="lng" style="border-radius: 10px;
                  border: 1px solid #828282;
                  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);"></td>
		</tr>
		<tr>
      <br>
			<td>จังหวัด</td>
			<td><input type="text" id="provinceInput" name="province" placeholder="Selected Province" readonly 
      style="border-radius: 10px;
                  border: 1px solid #828282;
                 
                  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);"></td>
		</tr> 
  </div>
    <br> 
   <div id="map" style=" margin-top: 0%;"></div>
   </div>

    <tr><td></td>
			<td><input class="button mt-4" type="submit" name="send" value="ยืนยัน" style="width: 15%; margin-left: 30%; 
                  background-color: #F07028;">
     			<input class="button" type="reset" name="cancel" value="รีเซ็ต" style="width: 15%; margin-left: 2%;">
          <!-- <input class="button button1" type="reset" name="cancel" value="Reset"> -->
			</td>
		</tr>
</form>

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


<?php }else {
    
	$name = (isset($_POST['name']) ? $_POST['name'] : '');
	$address = (isset($_POST['address']) ? $_POST['address'] : '');
  $open = (isset($_POST['open']) ? $_POST['open'] : '');
  $close = (isset($_POST['close']) ? $_POST['close'] : '');
  $description = (isset($_POST['description']) ? $_POST['description'] : '');

	$lat = (isset($_POST['lat']) ? $_POST['lat'] : 0);
	$lng = (isset($_POST['lng']) ? $_POST['lng'] : 0);

  $drink = array();
  $drink = (isset($_POST['drink']) ? $_POST['drink'] : '');

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
    $on_music = in_array('on_music', $music) ? 1 : 0;
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

require("../ConfigDB.php");
	$sql = "USE zbvfpszw_group_recommen";
	$conn->query($sql);
    $user_id = $_SESSION["user_id"];

$sql = "INSERT INTO entertainment VALUES(null, '$name', '$address', $lat , $lng , '$open','$close',$user_id,$ent_monday,$ent_tuesday,$ent_wednesday,$ent_thursday,$ent_friday,$ent_saturday,$ent_sunday,
'$description', $inter , $pop , $acoustic, $country, $jazz, $rock, $rap, $EDM, $folk, $live_music, $on_music, $indie, 
$pub, $bar, $indoor, $outdoor,$cocktail_bar, $restaurant, $Vintage, $Minimal, $Modern, $Camp, $Thai_Ban, $Luk_Thung);";



echo "<center>";
	if ($conn->query($sql) === TRUE) {
        $sql = "SELECT Ent_id from entertainment where ent_name = '$name' ";
        $result = $conn->query($sql);

	if($result->num_rows > 0) {
        $data = $result->fetch_array();
        $_SESSION['Ent_id'] = $data['Ent_id']; 
        $id = $_SESSION['Ent_id'];
		echo "New record created successfully.";

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {//AIzaSyBIBZLpGDwASIYwXIC4WM-qVcP76mFr6Bo
      // Check if files were uploaded
      if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
          $path = "../img/EntImg/";
          $date1 = date("Ymd_his");
          $numrand = mt_rand();
  
          // Loop through all uploaded files
          foreach ($_FILES['images']['name'] as $key => $image_name) {
              // Create a new name for the file
              $type = pathinfo($image_name, PATHINFO_EXTENSION);
              $newname = $numrand . $date1 . $key . "." . $type;
              $path_copy = $path . $newname;
  
              // Check if the file type is valid
              $allowed_types = ['jpeg', 'jpg', 'png', 'gif'];
              if (!in_array(strtolower($type), $allowed_types)) {
                  echo "Invalid file type for $image_name!<br>";
                  continue;  // Skip to the next file
              }
  
              // Move the uploaded file to the destination
              if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $path_copy)) {
                  // Insert data into the entimg table
                  $sql = "INSERT INTO entimg VALUES (0, '$newname', $id)";
  
                  if ($conn->query($sql) === TRUE) {
                      echo "File $newname uploaded and data added to entimg table successfully!<br>";
                  } else {
                      echo "Failed to add data to entimg table: " . $conn->error . "<br>";
                  }
              } else {
                  echo "Error uploading file $image_name<br>";
              }
          }
      } else {
          echo "Please select at least one image file!";
      }
  } else {
      echo "Direct access to this page is not allowed!";
  }

  

		if($drink != ''){
			foreach($drink as $drink_id){
				$sql = "INSERT INTO entdrink VALUES
						(0,$drink_id,$id)";	
        if ($conn->query($sql) === TRUE) {
          //echo "<center><br>การเพิ่มข้อมูลลงในตาราง studentcareer ประสบความสำเร็จ</center>";
        } else {
          echo "<center><br>ไม่สามารถเพิ่มข้อมูลใหม่ลงในตาราง drink ได้ ".$conn->error."</center";
        }					
			}
		}

  }

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
echo "</center>";

	$conn->close();

	////////////   content stop  //////////////////
	echo "</div>";

	echo "<meta http-equiv=\"Refresh\" content=\"1; url=EntHome.php\">";
}
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