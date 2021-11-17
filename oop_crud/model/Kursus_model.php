<?php

class Kursus_model {

    protected $db;
    function __construct($db){
        $this->db = $db;
    }

    function tampil_data()
    {
        $row = $this->db->prepare("SELECT * from tbl_anggota join tbl_kontrak_mapel 
        on tbl_anggota.id_anggota=tbl_kontrak_mapel.id_anggota 
        join tbl_jenis_paket on tbl_kontrak_mapel.id_jenis_paket=tbl_jenis_paket.id_paket
        group by tbl_anggota.id_anggota");
        $row->execute();
        return $hasil = $row->fetchAll();
    }

    function getData($id){
        $row = $this->db->prepare("SELECT * FROM tbl_anggota join tbl_kontrak_mapel on tbl_anggota.id_anggota=tbl_kontrak_mapel.id_anggota WHERE tbl_anggota.id_anggota='$id' 
        group by tbl_anggota.id_anggota");
        $row->execute();
        return $hasil = $row->fetch();
    }

    function getJenisPaket(){
        $row = $this->db->prepare("SELECT * FROM tbl_jenis_paket");
        $row->execute();
        return $hasil = $row->fetchAll();
    }

    function getMapel(){
        $row = $this->db->prepare("SELECT * FROM tbl_mapel");
        $row->execute();
        return $hasil = $row->fetchAll();
    }

    function getAdmin(){
        $row = $this->db->prepare("SELECT * FROM tbl_admin");
        $row->execute();
        return $hasil = $row->fetchAll();
    }

    function getKontrak(){
        $id = $_GET['id'];
        $row = $this->db->prepare("SELECT * FROM tbl_kontrak_mapel where id_anggota='$id'");
        $row->execute();
        return $hasil = $row->fetchAll();
    }

    // function getQty(){
    //     $row = $this->db->prepare("SELECT *,count(tbl_anggota.id_anggota) as quantity FROM tbl_anggota 
    //     join tbl_kontrak_mapel on tbl_anggota.id_anggota=tbl_kontrak_mapel.id_anggota 
    //     join tbl_jenis_paket on tbl_kontrak_mapel.id_jenis_paket=tbl_jenis_paket.id_paket
    //     join tbl_admin on tbl_admin.id_admin=tbl_anggota.id_admin
    //     group by tbl_anggota.id_anggota ");
    //      $row->execute();
    //      return $hasil = $row->fetchAll();
    // }

    function simpanData($data){
        $rowSQL = array();
        $toBind = array();
        $columnNames = array_keys($data[0]);
        foreach($data as $arrayIndex => $row){
            $params = array();
            foreach($row as $columnName => $columnValue){
                $param = ":" . $columnName . $arrayIndex;
                $params[] = $param;
                $toBind[$param] = $columnValue;
            }
            $rowSQL[] = "(" . implode(", ", $params) . ")";
        }
        $sql = "INSERT INTO tbl_anggota (" . implode(", ", $columnNames) . ") VALUES " . implode
        (", ", $rowSQL);
        $row = $this->db->prepare($sql);
        foreach($toBind as $param => $val){
            $row->bindValue($param, $val);
        }
    }

    function updateData($data,$id){
        $setPart = array();
        foreach ($data as $key => $value){
            $setPart[] = $key. "=:" . $key;
        }
        $sql = "UPDATE tbl_anggota SET ".implode(', ', $setPart)." WHERE id = :id";
        $row = $this->db->prepare($sql);
        $row ->bindValue(':id',$id);
        foreach($data as $param => $val){
            $row->bindValue($param, $val);
        }
        return $row->execute();
    }

    function hapusData($id){
        $sql = "DELETE FROM `tbl_anggota` WHERE `id_anggota`= ?";
        $sql = "DELETE FROM `tbl_kontrak_mapel` WHERE `id_anggota`= ?";
        $row = $this->db->prepare($sql);
        return $row->execute(array($id));
    }

}
?>