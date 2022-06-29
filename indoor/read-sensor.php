<?php


require_once '../koneksi.php';
header("Content-type:application/json");

$result = mysqli_query($conn, "SELECT device_id, ROUND(AVG(suhu_udara),2) AS avgSuhu, ROUND(AVG(kelembapan_udara),2) AS avgKelembapan, ROUND(AVG(tds),2) AS avgTds, ROUND(AVG(ec),2) AS avgEc, ROUND(AVG(intensitas_cahaya),2) as avgIntensitasCahaya, HOUR(time) as hh, DATE(time) as dd  FROM data_sensor_indoor WHERE DATE_SUB(time, INTERVAL 1 HOUR) GROUP BY hh");
$row = mysqli_fetch_assoc($result);
var_dump($row);
$rows = array();
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $data = array(
            "date" => $row['dd'],
            "hour" => $row['hh'],
            "temperature" => $row['avgSuhu'],
            "humidity" => $row['avgKelembapan'],
            "intensitas_cahaya" => $row['avgIntensitasCahaya'],
            "tds" => $row['avgTds'],
            "ec" => $row['avgEc'],
    );
    $rows[] = $data;
    }
}
echo json_encode($rows,JSON_FORCE_OBJECT);


?>