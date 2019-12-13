<?php 
include 'database.php';
$db = new database();

$aksi = $_GET['action'];
 if($aksi == "insert"){
     $db->insert($_POST['nama'],$_POST['nim'],$_POST['kelas'],$_POST['angkatan']);
 	header("location:../view/index.php");
 }
 elseif($aksi == "update"){ 	
    $db->update($_POST['id'],$_POST['nama'],$_POST['nim'],$_POST['kelas'],$_POST['angkatan']);
    header("location:../view/index.php");
    // echo $_POST['kelas'];
 }
 elseif($aksi == "delete"){
    $db->delete($_GET['id']);
 	header("location:../view/index.php");
 }
 else{
     echo "action not found, wkwkk";
 }
?>