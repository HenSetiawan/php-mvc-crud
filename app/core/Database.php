<?php 
    
    class Database{

        private $host = DB_HOST;
         private $pass =DB_PASS;
         private $user =DB_USER;
         private $dbname = DB_NAME;
         private $dbh;
         private $stmt;



        // koneksi database
         public function __construct()
         {
             $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

             

             try{
                $this->dbh=new PDO($dsn,$this->user,$this->pass);
             }catch(PDOException $e){
                 die ($e->getMessage());
             }    
         }
         // query database
         public function query($query)
         {
             $this->stmt=$this->dbh->prepare($query);
         }


         // bind
         public function bind($param,$value,$type=null)
         {
            if(is_null($type)){
                switch(true){
                    case is_int($value):PDO::PARAM_INT;
                break;

                case is_bool($value):PDO::PARAM_BOOL;
                    break;

                case is_null($value):PDO::PARAM_NULL;
                    break;
                default :PDO::PARAM_STR;

                }
            }

            $this->stmt->bindValue($param,$value);
         }



         // fecth all data
         public function getAll()
         {
             $this->stmt->execute();
             return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
         }


         // fecth data
         public function getSingle()
         {
             $this->stmt->execute();
             return $this->stmt->fetch(PDO::FETCH_ASSOC);
         }


         // execute query
         public function execute()
         {
             $this->stmt->execute();
         }


         public function rowCount()
         {
            return $this->stmt->rowCount();
         }


    }