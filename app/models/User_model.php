<?php

class User_model{
    private $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect('localhost','root','','indoor_farming');
        if(!isset($this->conn)){
            header('location: '.URLBASE.'/connError');
        }

        if(isset($_COOKIE['username'])){
            $username = $_COOKIE['username'];
            $result = mysqli_query($this->conn,"SELECT username FROM user WHERE username = '$username'");
            $row = mysqli_fetch_assoc($result);
            if($username == $row['username']){
                $_SESSION['login'] = true;
            }
        }
    }
    public function verifyUser($data){
        $error = false;
        if(isset($data['username']) && isset($data['password'])){
            $username = $data['username'];
            $password = md5($data['password']);
            $result = mysqli_query($this->conn, "SELECT username,password,role FROM user WHERE username = '$username'");
            if(mysqli_num_rows($result) === 1 ){
                $row = mysqli_fetch_assoc($result);
                if($password === $row['password']){
                    if($row['role'] == 'admin'){
                        session_start();
                        $_SESSION['login'] = true;
                        setcookie('username', $username,time()+6000*24);
                        header('location: '. URLBASE);
                        exit;
                    }
                    else if($row['role'] == 'client'){
                        session_start();
                        $_SESSION['login'] = true;
                        setcookie('username', $username,time()+6000*24);
                        header('location: '. URLBASE);
                        exit;
                    }

                }
            }$error = true;
        }
        return $error;
    }

    public function registerUser($data){
        $error = false;
        if(isset($data['username']) && isset($data['password'])){
            $username = $data['username'];
            $password = hash('md5',$data['password']);
            $result = mysqli_query($this->conn,"SELECT username FROM user WHERE username = '$username'");
            if(mysqli_num_rows($result) === 1){
                $error = true;
            }else {
                mysqli_query($this->conn, "INSERT INTO user VALUES ('null','$username','$password','client')");
                $error = false;
            }
        }
        return $error;

    }

    public function getRole(){
        $role = '';
        $username = $_COOKIE['username'];
        $result =mysqli_query($this->conn, "SELECT role FROM user WHERE username = '$username'");
        if(mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);
            $role = $row['role'];
        }
        return $role;
    }

    public function getAllUser(){
        $result = mysqli_query($this->conn, "SELECT user_id,username,role FROM user");
        $rows= [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getUserFromId($id){
        $result = mysqli_query($this->conn,"SELECT user_id,username,role FROM user WHERE user_id = '$id'");
        if(mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }

    }

    public function editData($data,$id){
        if(isset($data)){
            $username = $data['username'];
            $role = $data['role'];
            $error = false;
            $result= mysqli_query($this->conn, "UPDATE user SET username = '$username', role = '$role' WHERE user_id = '$id'");
            if(!$result){
                $error = true;
            }
            else{
                $error = false;
            }
    }
        return $error;
    }

    public function hapusData($id){
        $result = mysqli_query($this->conn, "DELETE FROM user WHERE user_id = $id");
        $error = false;
        if(!$result){
            $error = true;
        }
        else{
            $error = false;
        }
        return $error;

    }

}