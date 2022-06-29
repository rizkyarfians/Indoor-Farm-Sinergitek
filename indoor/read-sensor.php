<?php


require_once '../koneksi.php';
header("Content-type:application/json");
$result = mysqli_query($conn, "SELECT * FROM data_sensor_indoor");

$rows = array();
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $data = array(
            "date" => $row['time'],
            "temperature" => $row['suhu_udara'],
            "humidity" => $row['kelembapan_udara'],
            "intensitas_cahaya" => $row['intensitas_cahaya'],
            "tds" => $row['tds'],
            "ec" => $row['ec'],
    );
    $rows[] = $data;
    }
}
echo json_encode($rows,JSON_FORCE_OBJECT);


?>