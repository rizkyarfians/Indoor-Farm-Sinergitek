<?php

class Logout{
    public function __construct()
    {
        session_start();
        session_destroy();
        setcookie('username','',time()-1);
    }
    public function index(){
        header('Location:login');
    }
}
?>