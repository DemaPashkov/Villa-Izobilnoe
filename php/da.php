<?php
require_once "bd.php";



$q = mysqli_query($link, "SELECT * FROM `isobilnoe` WHERE `type` = '" . $_POST['room'] . "' AND `date_in` = '".$_POST['datein']."' AND  `date_out` = ".$_POST['dateout']."");
$count = mysqli_num_rows($q);

if ($_POST['room'] == 'VIP') {
    $datein = date('Y-m-d', strtotime($_POST['datein']));
    $dateout = date('Y-m-d', strtotime($_POST['dateout']));
    
        mysqli_query($link, "INSERT INTO `isobilnoe` (`id`, `date_in`, `date_out`, `guests`, `type`, `time`) VALUES (NULL, '" . $datein . "', '" . $dateout . "', '" . $_POST['guest'] . "', 'vip', '" . date('Y-m-d') . "')");
        print_r($res);
        echo $datein;
    }

if ($_POST['room'] !== 'VIP') {
    $datein = date('Y-m-d', strtotime($_POST['datein']));
    $dateout = date('Y-m-d', strtotime($_POST['dateout']));
    
        mysqli_query($link, "INSERT INTO `isobilnoe` (`id`, `date_in`, `date_out`, `guests`, `type`, `time`) VALUES (NULL, '" . $datein . "', '" . $dateout . "', '" . $_POST['guest'] . "', '" . $_POST['room'] . "', '" . date('Y-m-d') . "')");
        echo $_POST['datein'];
        
    }


