<?php 

    include '../Database.php';
    include '../model/Kursus_model.php';

    class Kursus{

        public $model;

        function __conctruct(){
            $db = new Database();
            $conn = $db->DBConnect();
            $this->model = new Kursus_model($conn);
        }

        function index(){
            $hasil = $this->model->tampil_data();
            return $hasil;
        }
    }


?>