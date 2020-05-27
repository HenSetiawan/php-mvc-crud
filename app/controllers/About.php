<?php 
 class About extends Controller{
     
     public function index ($nama="Hendy",$pekerjaan="Mahasiswa"){
         $data['judul']="About";
         $data['nama']=$nama;
         $data['pekerjaan']=$pekerjaan;

         $this->view('about/index',$data);
     }

     public function pages(){
        $data['judul']="Pages";
        
         $this->view('about/pages',$data);
     }




 }