<?php

class Dashboard extends Controller{
    public function __construct()
    {
        if(!isset($_SESSION['login'])){
            header('Location: login');
            exit;
        }
    }
    public function index(){
        $data['judul'] = 'Dashboard | Aquaponik';
        $role = $this->model('User_model')->getRole();
        if($role === 'admin'){
            $this->view('templates/admin_dashboard/header', $data);
        }
        else{
            $this->view('templates/user_dashboard/header', $data);

        }$this->view('dashboard/index');
        $this->view('templates/admin_dashboard/footer');
    }

    public function pembibitan(){
        $data['judul'] = 'Dashboard | Pembibitan';
        $this->view('templates/admin_dashboard/header',$data);
        $this->view('dashboard/seeding');
        if(isset($_POST)){
            $this->model('Data_model')->dataForm($_POST);
        }
        $this->view('templates/admin_dashboard/footer');

    }
    public function hidroponik(){
        $data['judul'] = 'Dashboard | Hidroponik';
        $this->view('templates/admin_dashboard/header',$data);
        $this->view('dashboard/hidroponik');
        $this->view('templates/admin_dashboard/footer');
    }


}

?>