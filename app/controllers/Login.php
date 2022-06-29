<?php

class Login extends Controller{
    public function __construct()
    {
        if(isset($_SESSION['login'])){
            header('location: index');
            exit;
        }
    }
    public function index(){
        $data['judul'] = 'Login Pages';
        $this->view('templates/base/header',$data);
        if($this->model('User_model')->verifyUser($_POST)){
            Flasher::setFlash('Username / Password', 'Salah', 'error');
            header('Location: '. BASEURL. '/login' );
            exit;
        }
        $this->view('login/index');
        $this->view('templates/base/footer');
    }


}