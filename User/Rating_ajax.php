<?php
session_start();
include "../ConfigDB.php";

$Ent_id = $_POST['Ent_id'];
$rating = $_POST['rating'];
$group_id = $_POST['group_id'];
$userid = $_POST['userid'];
$survey_id = $_POST['survey_id'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM post_rating WHERE Ent_id=$Ent_id AND userid=$userid AND survey_id=$survey_id";

$result = mysqli_query($conn, $query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];

if($count == 0){
    $insertquery = "INSERT INTO post_rating(userid, Ent_id, rating, survey_id) VALUES ($userid, $Ent_id, $rating, $survey_id)";
    mysqli_query($conn, $insertquery);
} else {
    $updatequery = "UPDATE post_rating SET rating=$rating WHERE userid=$userid AND Ent_id=$Ent_id AND survey_id=$survey_id";
    mysqli_query($conn, $updatequery);
}

$return_arr = array("rating" => $rating);

echo json_encode($return_arr);

?>
