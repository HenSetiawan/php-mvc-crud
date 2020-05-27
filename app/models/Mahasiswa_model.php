<?php 
     class Mahasiswa_model {

        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }


        public function getMhs()
        {
            $this->db->query("SELECT * FROM mahasiswa");
            return $this->db->getAll();
        }

      public function getId($id)
      {
          $this->db->query("SELECT * FROM mahasiswa WHERE id =:id ");
          $this->db->bind('id',$id);
            return $this->db->getSingle();
      }


      public function insert($data)
      {
          $this->db->query("INSERT INTO mahasiswa VALUES (null,:nama,:nim,:email,:jurusan)");
          $this->db->bind('nama',$data['nama']);
          $this->db->bind('nim',$data['jurusan']);
          $this->db->bind('email',$data['nim']);
          $this->db->bind('jurusan',$data['email']);
          
          $this->db->execute();

          return $this->db->rowCount();
      }


      public function deleteById($id)
      {
          $this->db->query("DELETE FROM mahasiswa WHERE id =:id");
          $this->db->bind('id',$id);
          $this->db->execute();
          return $this->db->rowCount();
      }


      public function search($keyword)
      {
          $this->db->query("SELECT * FROM mahasiswa WHERE nama LIKE  :keyword ");
          $this->db->bind('keyword', "%$keyword%");
          $this->db->execute();
          return $this->db->getAll();
      }

      public function ubah($data)
      {
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    nim = :nim,
                    email = :email,
                    jurusan = :jurusan
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();

      }
        

     }