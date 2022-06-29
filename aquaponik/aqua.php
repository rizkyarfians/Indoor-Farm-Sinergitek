<?php

require_once '../koneksi.php';


$data = json_decode(file_get_contents("php://input"),true);
header("Content-type: application/json");


if(isset($data['suhu_udara']) || isset($data['kelembapan_udara']) || isset($data['intensitas_cahaya'])  || isset($data['ph'])  || isset($data['device_id']) || isset($data['suhu_air'])){
    $suhu_udara = $data['suhu_udara'];
    $kelembapan_udara = $data['kelembapan_udara'];
    $intensitas_cahaya = $data['intensitas_cahaya'];
    $device_id= $data['device_id'];
    $ph = $data['ph'];
    $suhu_air = $data['suhu_air'];
    $result = mysqli_query($conn, "INSERT INTO data_sensor_aquaponik (device_id,suhu_udara,kelembapan_udara,intensitas_cahaya,ph,suhu_air) VALUES ('$device_id','$suhu_udara','$kelembapan_udara','$intensitas_cahaya','$ph','$suhu_air')");

    if($result){
        $response = array(
            'device_id' => $device_id,
            'Status' => 1,
            'Message' => 'Insert Success',
            'suhu_udara' => $suhu_udara,
            'kelembapan_udara' => $kelembapan_udara,
            'intensitas_cahaya' => $intensitas_cahaya,
            'ph' => $ph,
            'suhu_air' => $suhu_air
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