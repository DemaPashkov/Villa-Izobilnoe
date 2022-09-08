<?php

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

$price = getDatesFromRange($_GET['in'],$_GET['out']);

if (count($price) == "1") {
    echo "Error";    
}





if (count($price) > "1") {
    unset($price['0']);
    
    $q = count($price) * $_GET['price'];
    if ($_GET['eat'] == 2) {
        if($_GET['addguest'] == 1){
    
            $addprice = count($price) * '1000';
        }
        else{
            $addprice = '0';
        }
        $eat = count($price) * "1500" * $_GET['guest'] ;
        echo $q + $eat + $addprice, "₽";
    
    }

    else {
        if($_GET['addguest'] == 1){
    
            $addprice = count($price) * '1000';
        }
        else{
            $addprice = '0';
        }
        echo $q + $addprice, "₽";
    }
    
}