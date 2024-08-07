<?php 
require("../ConfigDB.php");

$survey_id = $_GET['survey_id'];
$group_id = $_GET['group_id'];

$SumSurvey = "SELECT 
        SUM(`inter`) AS Sum_inter,
        SUM(`pop`) AS Sum_pop,
        SUM(`acoustic`) AS Sum_acoustic, 
        SUM(`country`) AS Sum_country ,
        SUM(`jazz`) AS Sum_jazz ,
        SUM(`rock`) AS Sum_rock ,
        SUM(`rap`) AS Sum_rap ,
        SUM(`EDM`) AS Sum_EDM ,
        SUM(`folk`) AS Sum_folk ,
        SUM(`live_music`) AS Sum_live_music ,
        SUM(`dj`) AS Sum_dj ,
        SUM(`indie`) AS Sum_indie ,
        SUM(`pub`) AS Sum_pub ,
        SUM(`bar`) AS Sum_bar ,
        SUM(`indoor`) AS Sum_indoor ,
        SUM(`outdoor`) AS Sum_outdoor ,
        SUM(`cocktail_bar`) AS Sum_cocktail_bar,
        SUM(`restaurant`) AS Sum_restaurant ,
        SUM(`vintage`) AS Sum_vintage ,
        SUM(`minimal`) AS Sum_minimal ,
        SUM(`modern`) AS Sum_modern ,
        SUM(`camp`) AS Sum_camp ,
        SUM(`thai_ban`) AS Sum_thai_ban ,
        SUM(`luk_thung`) AS Sum_luk_thung
FROM survey_item
WHERE survey_id = $survey_id;";
$resultSumSurvey = mysqli_query($conn, $SumSurvey); 
$fetchdata = mysqli_fetch_array($resultSumSurvey);

$Sum_inter = $fetchdata['Sum_inter'];
$Sum_pop = $fetchdata['Sum_pop'];
$Sum_acoustic = $fetchdata['Sum_acoustic'];
$Sum_country = $fetchdata['Sum_country'];
$Sum_jazz = $fetchdata['Sum_jazz'];
$Sum_rock = $fetchdata['Sum_rock'];
$Sum_rap = $fetchdata['Sum_rap'];
$Sum_EDM = $fetchdata['Sum_EDM'];
$Sum_folk = $fetchdata['Sum_folk'];
$Sum_live_music = $fetchdata['Sum_live_music'];
$Sum_dj = $fetchdata['Sum_dj'];
$Sum_indie = $fetchdata['Sum_indie'];
$Sum_pub = $fetchdata['Sum_pub'];
$Sum_bar = $fetchdata['Sum_bar'];
$Sum_indoor = $fetchdata['Sum_indoor'];
$Sum_outdoor = $fetchdata['Sum_outdoor'];
$Sum_cocktail_bar = $fetchdata['Sum_cocktail_bar'];
$Sum_restaurant = $fetchdata['Sum_restaurant'];
$Sum_vintage = $fetchdata['Sum_vintage'];
$Sum_minimal = $fetchdata['Sum_minimal'];
$Sum_modern = $fetchdata['Sum_modern'];
$Sum_camp = $fetchdata['Sum_camp'];
$Sum_thai_ban = $fetchdata['Sum_thai_ban'];
$Sum_luk_thung = $fetchdata['Sum_luk_thung'];

$total = "SELECT 
        SUM(`inter`) + SUM(`pop`) + SUM(`acoustic`) + SUM(`country`) + SUM(`jazz`) + SUM(`rock`) 
        + SUM(`rap`) + SUM(`EDM`) + SUM(`folk`) + SUM(`live_music`) + SUM(`dj`) + SUM(`indie`) + SUM(`pub`) 
        + SUM(`bar`) + SUM(`indoor`) + SUM(`outdoor`) + SUM(`cocktail_bar`) + SUM(`restaurant`) + SUM(`vintage`) 
        + SUM(`minimal`) + SUM(`modern`) + SUM(`camp`) + SUM(`thai_ban`) + SUM(`luk_thung`) 
AS Total_sum 
FROM survey_item 
WHERE survey_id = $survey_id;";

$resultTotal = mysqli_query($conn, $total); 
$fetchdataTotal = mysqli_fetch_array($resultTotal);

$Total_sum = $fetchdataTotal['Total_sum'];

/* echo $weight_inter; */
$weights = array(
$weight_inter = $Sum_inter/$Total_sum,
$weight_pop = $Sum_pop/$Total_sum,
$weight_acoustic = $Sum_acoustic/$Total_sum,
$weight_country = $Sum_country/$Total_sum,
$weight_jazz = $Sum_jazz/$Total_sum,
$weight_rock = $Sum_rock/$Total_sum,
$weight_rap = $Sum_rap/$Total_sum,
$weight_EDM = $Sum_EDM/$Total_sum,
$weight_folk = $Sum_folk/$Total_sum,
$weight_live_music = $Sum_live_music/$Total_sum,
$weight_dj = $Sum_dj/$Total_sum,
$weight_indie = $Sum_indie/$Total_sum,
$weight_pub = $Sum_pub/$Total_sum,
$weight_bar = $Sum_bar/$Total_sum,
$weight_indoor = $Sum_indoor/$Total_sum,
$weight_outdoor = $Sum_outdoor/$Total_sum,
$weight_cocktail_bar = $Sum_cocktail_bar/$Total_sum,
$weight_restaurant = $Sum_restaurant/$Total_sum,
$weight_vintage = $Sum_vintage/$Total_sum,
$weight_minimal = $Sum_minimal/$Total_sum,
$weight_modern = $Sum_modern/$Total_sum,
$weight_camp = $Sum_camp/$Total_sum,
$weight_thai_ban = $Sum_thai_ban/$Total_sum,
$weight_luk_thung = $Sum_luk_thung/$Total_sum);


$sqlEnt_item = "SELECT Ent_id,
        `inter`,`pop`,`acoustic`,`country` ,`jazz`,`rock`,`rap`,`EDM`,`folk`,`live_music`,`dj`,`indie`,
        `pub`,`bar`,`indoor`,`outdoor`,`cocktail_bar`,`restaurant`,`vintage`,`minimal`,`modern`,`camp`,
        `thai_ban`,`luk_thung`
FROM entertainment;";
$resultEnt_item = mysqli_query($conn, $sqlEnt_item); 

while($row = mysqli_fetch_array($resultEnt_item)){
    $Ent_id = $row['Ent_id'];
    $sumEnt = 0;

    $Ent_inter = $row['inter']*$weight_inter;
    $Ent_pop = $row['pop']*$weight_pop;
    $Ent_acoustic = $row['acoustic']*$weight_acoustic;
    $Ent_country = $row['country']*$weight_country;
    $Ent_jazz = $row['jazz']*$weight_jazz;
    $Ent_rock = $row['rock']*$weight_rock;
    $Ent_rap= $row['rap']*$weight_rap;
    $Ent_EDM= $row['EDM']*$weight_EDM;
    $Ent_folk= $row['folk']*$weight_folk;
    $Ent_live_music= $row['live_music']*$weight_live_music;
    $Ent_dj= $row['dj']*$weight_dj;
    $Ent_indie= $row['indie']*$weight_indie;
    $Ent_pub= $row['pub']*$weight_pub;
    $Ent_bar= $row['bar']*$weight_bar;
    $Ent_indoor= $row['indoor']*$weight_indoor;
    $Ent_outdoor= $row['outdoor']*$weight_outdoor;
    $Ent_cocktail_bar= $row['cocktail_bar']*$weight_cocktail_bar;
    $Ent_restaurant= $row['restaurant']*$weight_restaurant;
    $Ent_vintage= $row['vintage']*$weight_vintage;
    $Ent_minimal= $row['minimal']*$weight_minimal;
    $Ent_modern= $row['modern']*$weight_modern;
    $Ent_camp= $row['camp']*$weight_camp;
    $Ent_thai_ban= $row['thai_ban']*$weight_thai_ban;
    $Ent_luk_thung= $row['luk_thung']*$weight_luk_thung;

    $Sum_Ent = $Ent_pop+$Ent_acoustic+$Ent_country+$Ent_jazz+$Ent_rock+$Ent_rap+$Ent_EDM+$Ent_folk+$Ent_live_music
    +$Ent_dj+$Ent_indie+$Ent_pub+$Ent_bar+$Ent_indoor+$Ent_outdoor+$Ent_cocktail_bar+$Ent_restaurant+$Ent_vintage
    +$Ent_modern+$Ent_camp+$Ent_thai_ban+$Ent_luk_thung;

/*     echo $Ent_id;
    echo "<br>";
    echo $Sum_Ent;
    echo "<br>";
    echo "<br>"; */


    $sumEntArray[$Ent_id] = $Sum_Ent;
}
        // Sort sumEntArray in descending order
        arsort($sumEntArray);

        // Get the top 3 sumEnt
        $top3SumEnt = array_slice($sumEntArray, 0, 3, true);
    
        // Print the top 3 sumEnt
        foreach ($top3SumEnt as $entId => $sumEnt) {
                $sql = "INSERT INTO `rank`(`score`, `Ent_id`, `survey_id`) VALUES($sumEnt,$entId,$survey_id)";
                $conn->query($sql); 
        }

        mysqli_close($conn);

        echo "<meta http-equiv=\"Refresh\" content=\"1; url=MainGroup.php?group_id=$group_id&StartRank=true\">";
?>