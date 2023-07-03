<?php
class Library extends connnection{

    function __construct($db){
        $this->db = $db;
    }
    function listData($sql)
    {
        $row = $this->db->prepare($sql);
        $row->execute();
        return $row->fetchAll();
    }  
    function showData($sql){
        $row = $this->db->prepare($sql);
        $row->execute();
        return $hasil = $row->fetch();
    }
    function sqlAction($sql){
        $row = $this->db->prepare($sql);
        return $row->execute();
    }   
    function tambah_siswa(){
        $stmn = $koneksiDB->prepare("INSERT INTO user (username, pass, lvl) VALUES (?, ?, ?)");
        $stmn->bindParam(1, $username);
        $stmn->bindParam(2, $pass);
        $stmn->bindParam(3, $lvl);

        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $lvl = $_POST['lvl'];
        return $stmn-execute();
 }
}
?> 