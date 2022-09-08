<?php
require_once "bd.php";

function getDatesFromRange($start, $end, $format = 'Y-m-d')
{

    $array = array();
    $interval = new DateInterval('P1D');
    $realEnd = new DateTime($end);
    $realEnd->add($interval);
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    foreach ($period as $date) {

        $array[] = $date->format($format);

    }

    return $array;

}



$getdatein = mysqli_query($link, 'SELECT `date_in`, `date_out` FROM `isobilnoe` WHERE `type` = "'.$_GET['room'].'"');
$getdatein_vip = mysqli_query($link, 'SELECT `date_in`, `date_out` FROM `isobilnoe` WHERE `type` = "'.$_GET['room'].'"');
$count = mysqli_num_rows($getdatein);
$result = [];
if ($_GET['room'] == "VIP") {
	while ($getdateins_vip = mysqli_fetch_array($getdatein_vip)) {
		$get_date = mysqli_query($link, 'SELECT `date_in`, `date_out` FROM `isobilnoe` WHERE `date_in` = "'.$getdateins["date_in"].'" AND `date_out` = "'.$getdateins["date_out"].'" AND `type` = "'.$_GET['room'].'"');
		$count_data = mysqli_num_rows($get_date);
		if ($count_data >= 1){
			array_push($result, getDatesFromRange($getdateins['date_in'], $getdateins['date_out']));
		}
		
	}
}else{
	while ($getdateins = mysqli_fetch_array($getdatein)) {
		
		$get_date = mysqli_query($link, 'SELECT `date_in`, `date_out` FROM `isobilnoe` WHERE `date_in` = "'.$getdateins["date_in"].'" AND `date_out` = "'.$getdateins["date_out"].'" AND `type` = "'.$_GET['room'].'"');
		$day = getDatesFromRange($getdateins['date_in'], $getdateins['date_out']);
		if (mysqli_num_rows($get_date) >= 3 AND in_array($getdateins["date_in"], $day)) {
			array_push($result, getDatesFromRange($getdateins["date_in"], $getdateins["date_out"]));
		}
	}
}



print_r($count_data);
echo "----";
print_r($result);	