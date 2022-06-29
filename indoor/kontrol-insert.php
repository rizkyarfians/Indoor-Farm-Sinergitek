<?php

require_once '../koneksi.php';


$data = json_decode(file_get_contents("php://input"),true);
header("Content-type: application/json");

if(isset($data['led']) || isset($data['pompa_air']) || isset($data['pompa_a'])  || isset($data['pompa_b'])  || isset($data['device_id']) || isset($data['kipas']) || isset($data['get_time']) || isset($data['menit']) || isset($data['jam'])){
    $led = $data['led'];
    $pompa_air = $data['pompa_air'];
    $device_id = $data['device_id'];
    $pompa_a = $data['pompa_a'];
    $pompa_b = $data['pompa_b'];
    $kipas = $data['kipas'];
    $get_time = $data['get_time'];
    $jam = $data['jam'];
    $menit = $data['menit'];
    $result = mysqli_query($conn, "INSERT INTO data_aktuator_indoor(device_id, led,pompa_air,pompa_a,pompa_b, kipas, get_time,jam,menit) VALUES ('$device_id','$led', '$pompa_air', '$pompa_a','$pompa_b','$kipas', '$get_time',  '$jam',  '$menit')");

    if($result){
        $response = array(
            'Status' => 1,
            'Message' => 'Insert Success',

        );
    }
    else{
        $response = array(
            'Status' => 0,
            'Message' => 'Insert Failed'
        );
    }
}else{
    $response = array(
        'Status' => 0,
        'Message' => 'Input Salah'
    );
}

header("Content-type: application/json");
echo json_encode($response);

?>