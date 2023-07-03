<?php
    $user='root';
    $pass='';
    try{
    $koneksiDB = new PDO("mysql:host=localhost;dbname=sistem_ujian;", $user, $pass);
    $koneksiDB->exec("set names utf8");
    $koneksiDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return  $koneksiDB;
}
    catch (PDOException $e) {
    return 'Connection failed: ' . $e->getMessage();
    }

?>