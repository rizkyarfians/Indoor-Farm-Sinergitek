<?php

class Register extends Controller{
    public function index(){
        $data['judul'] = 'Sign Up';
        $this->view('templates/base/header',$data);
        $this->view('register/index');
        if($this->model('User_model')->registerUser($_POST)){
            Flasher::setFlash('pendaftaran', 'gagal','error');
            header('location: '. BASEURL. '/register');
            exit;
        }else{
            Flasher::setFlash('pendaftaran', 'berhasil','success');
        }

        $this->view('templates/base/footer');
    }

}
?>