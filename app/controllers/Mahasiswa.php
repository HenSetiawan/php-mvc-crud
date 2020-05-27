<?php 

    class Mahasiswa extends Controller{

        public function index(){
            
            $data['judul']="Home";
            $data['mhs']=$this->model('Mahasiswa_model')->getMhs();
            $this->view('mahasiswa/index',$data);
        }

        public function detail($id){
            $data['judul']="Home";
            $data['mhs']=$this->model('Mahasiswa_model')->getId($id);
            $this->view('mahasiswa/detail',$data);

        }


        public function tambah()
        {
            if($this->model('Mahasiswa_model')->insert($_POST) > 0){
                header('Location:'.BASEURL);
                Flasher::setflash("Berhasil","Ditambahkan","success");
                exit;
            }else{
                header('Location:'.BASEURL);
                Flasher::setflash("Gagal","Dihapus","danger");
                exit;
            }
            
        }

        public function hapus($id)
        {
            if($this->model('Mahasiswa_model')->deleteById($id) > 0){
                header("Location:".BASEURL);
                Flasher::setflash("Berhasil","Dihapus","success");
                exit;
            }else{
                header("Location:".BASEURL);
                Flasher::setflash("Gagal","Dihapus","danger");
                exit;
            }
        }

        public function cari()

        {
            if(isset($_POST['search'])){
                $data['mhs']=$this->model('Mahasiswa_model')->search($_POST['keyword']);
                $data['judul']='Home';
                $this->view('mahasiswa/index',$data);
            }else{
               header("Location:".BASEURL);
            }
           
        }


        public function getubah()
        {
            $id = $_POST['id'];
            echo( json_encode( $this->model('Mahasiswa_model')->getId($id)));
        }

        public function ubah()
        {
            if($this->model('Mahasiswa_model')->ubah($_POST) > 0){
                header('Location:'.BASEURL);
                Flasher::setflash("Berhasil","Diubah","success");
                exit;
            }else{
                header('Location:'.BASEURL);
                Flasher::setflash("Gagal","Diubah","danger");
                exit;
            }
        }
        
    }

