<?php

class Datalog extends Controller{
    public function __construct()
    {
        if(!isset($_SESSION['login'])){
            header('Location: login');
            exit;
        }
    }
    public function index(){
        $data['judul'] = 'Datalog';
        $role = $this->model('User_model')->getRole();
        if($role === 'admin'){
            $this->view('templates/admin_dashboard/header',$data);
        }else{
            $this->view('templates/user_dashboard/header',$data);

        }
        $this->view('datalog/index');
        $this->view('templates/datalog/footer');
    }
}