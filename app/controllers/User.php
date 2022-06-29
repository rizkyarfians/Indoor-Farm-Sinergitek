<?php

class User extends Controller{
    public function __construct()
    {
        if($this->model('User_model')->getRole() === 'client'){
            header('location: '.URLBASE);
        }
    }
    public function index(){
        $data['judul'] = 'User';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('templates/admin_dashboard/header',$data);
        $this->view('userlist/index',$data);
        $this->view('templates/base/footer',$data);
    }

    public function edit($id){
        if(isset($_POST)){
            if($this->model('User_model')->editData($_POST,$id)){
                Flasher::setFlash('Data', 'Gagal diubah', 'error');
                header('Location: '.URLBASE. '/user/profil' );
                exit;
            }else{
                Flasher::setFlash('Data', 'Berhasil diubah', 'success');
                header('Location: '.URLBASE. '/user' );
                exit;
            }
        }
    }
    public function profil($id){
        $data['judul'] = 'Profil';
        $this->view('templates/admin_dashboard/header',$data);
        $data['user'] = $this->model('User_model')->getUserFromId($id);
        $this->view('userlist/profil',$data);
        $this->view('templates/base/footer',$data);
    }
    public function hapus($id){
        if($this->model('User_model')->hapusData($id)){
            Flasher::setFlash('Data', 'Gagal dihapus', 'error');
            header('Location: '.URLBASE. '/user/profil' );
            exit;
        }else{
            Flasher::setFlash('Data', 'Berhasil dihapus', 'success');
            header('Location: '.URLBASE. '/user' );
            exit;
        }
    }

}