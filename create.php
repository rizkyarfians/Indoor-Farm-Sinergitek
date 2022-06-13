<?php

require_once 'koneksi.php';


$data = json_decode(file_get_contents("php://input"),true);
header("Content-type: application/json");


if(isset($data['suhu_udara']) || isset($data['kelembapan_udara']) || isset($data['tds'])  || isset($data['ec'])  || isset($data['device_id']) || isset($data['intensitas_cahaya'])){
    $suhu = $data['suhu_udara'];
    $kelembapan = $data['kelembapan_udara'];
    $device_id = $data['device_id'];
    $intensitas_cahaya = $data['intensitas_cahaya'];
    $tds = $data['tds'];
    $ec = $data['ec'];
    $result = mysqli_query($conn, "INSERT INTO data_sensor_indoor (device_id,suhu_udara,kelembapan_udara,intensitas_cahaya,tds,ec) VALUES ('$device_id','$suhu','$kelembapan','$intensitas_cahaya','$tds','$ec')");

    if($result){
        $response = array(
            'device_id' => $device_id,
            'Status' => 1,
            'Message' => 'Insert Success',
            'suhu_udara' => $suhu,
            'kelembapan_udara' => $kelembapan,
            'intensitas_cahaya' => $intensitas_cahaya,
            'tds' => $tds,
            'ec' => $ec
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