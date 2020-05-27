<?php

    class App{

        //default controllers,Method dan params
        protected $controller ='Mahasiswa';
        protected $method ='index';
        protected $params =[];

        public function __construct()
        {
           $url =$this->parseURL();


           //controler
          if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
              $this->controller = $url[0];
              unset($url[0]);
          }


          // hubungkan dengan class yang sesuai url (controllers)
          require_once '../app/controllers/'.ucwords( $this->controller).'.php';

          // instansiasi objek dari class controllers
          $this->controller=new $this->controller;


          // method 
          if(isset ($url[1])){
              if(method_exists($this->controller,$url[1])){
                  $this->method=$url[1];
                  unset($url[1]);
              }
          }


          // params
          if(!empty($url)){
              $this->params=$url;
              
          }    

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller,$this->method],$this->params);
    
        }

        public function parseURL(){
            if(isset($_GET['url'])){
                $url =rtrim( $_GET['url'],'/');
                $url=filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);

                return $url;
            }
        }

    }
