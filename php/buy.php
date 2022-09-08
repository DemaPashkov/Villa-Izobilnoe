<?php

require('bd.php');

    if($_POST['eat'] == '1'){
        $eat = "Не включено";
    }
    elseif($_POST['eat'] == '2'){
        $eat = "Включено";
    }

    $datein = date('Y-m-d', strtotime($_POST['in']));
    $dateout = date('Y-m-d', strtotime($_POST['out']));
    $price = $_POST['price'];

mysqli_query($link, "INSERT INTO `isobilnoe`(`id`, `date_in`, `date_out`, `guests`, `type`, `time`, `price`) VALUES (null,'". $datein ."','". $dateout ."','". $_POST['guest'] ."','". $_POST['type'] ."','". date('Y-m-d') ."','".$price."')");



// // несколько получателей
$to = 'villa-izobilnoe@yandex.ru'; 

$subject = "Бронирование номера!"; 

$message = ' <p>Оформлена бронь</p> </br> <b>Бронь с '. $datein .' по '.$dateout.'</b> </br> <i>Номер: '.$_POST[type].'</i> </br>
            Питание: '.$eat.' </br> Кол-во гостей: '. $_POST['guest'] .'  </br>  ФИО: '.$_POST[name].' </br> Email: '.$_POST['email'].' </br> Телефон: '.$_POST['tel'].' </br> <b> Цена: '.$price.'</b> ';

$headers  = "Content-type: text/html; charset=UTF-8 \r\n"; 
$headers .= "From: Вилла-парк Изобильное <from@example.com>\r\n"; 
$headers .= "Reply-To: reply-to@example.com\r\n"; 

mail($to, $subject, $message, $headers); 


$to = $_POST['email']; // обратите внимание на запятую

$subject = "Бронь"; 

$message = 'Спасибо, что выбрали наш отель! <br> <br>
    <p></p> </br> <b>Вы забронировали с '. $datein .' по '.$dateout.'</b> </br> <i>Номер: '.$_POST[type].'</i> </br>
            Питание: '.$eat.' </br> Кол-во гостей: '. $_POST['guest'] .' </br>  ФИО: '.$_POST[name].' </br> Email: '.$_POST['email'].' </br> Телефон: '.$_POST['tel'].' </br>  <b> Цена:'.$price.'</b> ';

$headers  = "Content-type: text/html; charset=UTF-8 \r\n"; 
$headers .= "From: Вилла-парк Изобильное <from@example.com>\r\n"; 
$headers .= "Reply-To: reply-to@example.com\r\n"; 

mail($to, $subject, $message, $headers); 


?>
