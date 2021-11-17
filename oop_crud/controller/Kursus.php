<?php

    include '../Database.php';
    include '../model/Kursus_model.php';

    class Kursus{
        public $model;

        function __construct()
        {
            $db = new Database();
            $conn = $db->DBConnect();
            $this->model = new Kursus_model($conn); 
        }
           function index(){
            $kursus = $this->model->tampil_data();
            return $kursus;
        }
            function getData($id){
             $kursus = $this->model->getData($id);
             return $kursus;
        }

            function getJenisPaket(){
             $jenis_paket = $this->model->getJenisPaket();
             return $jenis_paket;
        }

            function getMapel(){
             $jenis_mapel = $this->model->getMapel();
             return $jenis_mapel;
        }

             function getAdmin(){
            $admin = $this->model->getAdmin();
            return $admin;
       }

            function getKontrak(){
            $kontrak = $this->model->getKontrak();
            return $kontrak;
       }

            function simpanKursus(){
                
            if(isset($_POST['simpan'])){
                $id=date('YmdHis');
                $nama=$_POST['nama'];
                $tempat_lahir=$_POST['tempat_lahir'];
                $jk=$_POST['jk'];
                $jenis_mapel=$_POST['jenis_mapel'];
                $admin=$_POST['admin'];

                $data[] = array(
                `id_anggota` =>'$id' ,
                `nama` => '$nama', 
                `tempat_lahir` => '$tempat_lahir',
                `jenis_kelamin` => '$jk',
                `id_admin` =>  '$admin'
                );
                   $result = $this->model->simpanData($data);
                       if($result){
                           header("Location:content.php?pesan=success&frm=add");
                        }else{
                            header("Location:content.php?pesan=gagal&frm=add");
                       }
                    }
                 }   


            function hapusData(){
                if(isset($_POST['delete'])) {
                    $id = $_POST['id'];

                    $result = $this->model->hapusData($id);

                    if($result){
                        header("Location:content.php?pesan=success&frm=del");
                        }else{
                            header("Location:content.php?pesan=gagal&frm=del");
                       }
                    }
                }


            function updateKursus(){
                
                if(isset($_POST['update'])){
                    $id=$_POST['id'];
                    $nama=$_POST['nama'];
                    $tempat_lahir=$_POST['tempat_lahir'];
                    $jk=$_POST['jk'];
                    $jenis_mapel=$_POST['jenis_mapel'];
                    $admin=$_POST['admin'];
                    
                    $data[] = array(
                        `id_anggota` =>'$id' ,
                        `nama` => '$nama', 
                        `tempat_lahir` => '$tempat_lahir',
                        `jenis_kelamin` => '$jk',
                        `id_admin` =>  '$admin'
                    );
                    $result = $this->model->updateData($data,$id);
                    if($result){
                        header("Location:content.php?pesan=success&frm=edit");
                     }else{
                         header("Location:content.php?pesan=gagal&frm=edit");
                    }
                }
          }  
     }
?>