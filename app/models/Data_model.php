<?php


class Data_model{
    private $conn;
    private $username;

    public function __construct(){
        $this->conn = mysqli_connect('localhost','root','','indoor_farming');
        if(!isset($this->conn)){
            header('location: '.URLBASE.'/connError');
        }

        if(isset($_COOKIE['username'])){
            $this->username = $_COOKIE['username'];
            $result = mysqli_query($this->conn,"SELECT username FROM user WHERE username = '$this->username'");
            $row = mysqli_fetch_assoc($result);
            if($this->username == $row['username']){
                $_SESSION['login'] = true;
            }
        }
    }

    public function dataForm($data){
        if(isset($data['jenis']) || isset($data['tanggal'])){
            $username = $this->username;
            $jenis = $data['jenis'];
            $tanggal = $data['tanggal'];
            $result = mysqli_query($this->conn,"INSERT INTO data_form VALUES ('null','$username','$jenis','$tanggal')");
        }
    }
}