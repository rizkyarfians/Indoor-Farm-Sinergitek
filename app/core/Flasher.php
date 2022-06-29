<?php
class Flasher{
    public static function setFlash($objek,$pesan,$tipe){
        //set session
        $_SESSION['flash']=[
            'pesan'=>$pesan,
            'objek' =>$objek,
            'tipe' => $tipe
        ];
    }

    public static function flash(){
        if(isset($_SESSION['flash'])){
            echo ' <div class="flasher '.$_SESSION['flash']['tipe'].'">
            <h3>'.$_SESSION['flash']['objek'].' telah ' .$_SESSION['flash']['pesan'].'</h3><div class="close">
            <span></span>
            <span></span>
            <input type="checkbox" id="close_check">
        </div>
        </div>';
          unset($_SESSION['flash']);
        }
    }
}