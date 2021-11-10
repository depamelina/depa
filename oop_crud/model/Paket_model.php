<?php

class Paket_model {

    protected $db;
    function __construct($db){
        $this->db = $db;
    }

    function tampil_data(){
        $row = $this->db->prepare("SELECT * from 'tbl_jenis_paket'");
        $row->execute();
        return $hasil = $row->fetchAll();
    }
}

?>