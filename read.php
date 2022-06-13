<?php


require_once 'koneksi.php';
header("Content-type:application/json");
$result = mysqli_query($conn, "SELECT * FROM sensor_value");

$rows = array();
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $data = array(
            "date" => $row['waktu_input'],
            "temperature" => $row['suhu'],
            "humidity" => $row['kelembapan']
    );
    $rows[] = $data;
    }
}
echo json_encode($rows,JSON_FORCE_OBJECT);


?>