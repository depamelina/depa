<?php

class Kursus_model {

    protected $db;
    function __construct($db){
        $this->db = $db;
    }

    function tampil_data(){
        $row = $this->db->prepare("SELECT * from tbl_anggota join tbl_kontrak_mapel on tbl_anggota.id_anggota=tbl_kontrak_mapel.id_anggota 
        join tbl_jenis_paket on tbl_kontrak_mapel.id_jenis_paket=tbl_jenis_paket.id_paket
        group by tbl_anggota.id_anggota");
        $row->execute();
        return $hasil = $row->fetchAll();
    }
}

?>