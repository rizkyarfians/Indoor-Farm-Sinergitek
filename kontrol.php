<?php
require_once 'koneksi.php';

if(isset($_POST['dutyFan']) || isset($_POST['relayFan'])){
    $dutyFan = (int)$_POST['dutyFan'];
    $voutFan = ($dutyFan/100) * 24;
    $pwmFan = (int)(($voutFan/24) * 255);
    $relayFan = $_POST['relayFan'];
    if($relayFan === 'true'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayFan = 1, pwmFan = '$pwmFan', dutyFan = '$dutyFan'");
        echo 'ON';
    }else if($relayFan === 'false'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayFan = 0, pwmFan = 0");
        echo 'OFF';
    }
}
else if(isset($_POST['dutyLed']) || isset($_POST['relayLed'])){
    $dutyLed = (int)$_POST['dutyLed'];
    $voutLed = ($dutyLed/100) * 24;
    $pwmLed = (int)(($voutLed/24) * 255);
    $relayLed = $_POST['relayLed'];
    if($relayLed === 'true'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayLed = 1, pwmLed = '$pwmLed', dutyLed = '$dutyLed'");
        echo 'ON';
    }else if($relayLed === 'false'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayLed = 0, pwmLed = 0");
        echo 'OFF';
    }
}
else if (isset($_POST['relayPump'])){
    $relayPump = $_POST['relayPump'];
    if($relayPump === 'true'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayPump = 1");
        echo 'ON';
    }else if($relayPump === 'false'){
        mysqli_query($conn,"UPDATE kontrol_aktuator SET relayPump = 0");
        echo 'OFF';
    }
}