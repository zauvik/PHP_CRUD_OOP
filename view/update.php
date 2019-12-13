<?
include '../action/database.php';
$db = new database(); //membuat instance dari class database pada file database.php
$id = $_GET['id'];
foreach($db->show_byid($id) as $x){
?>
<form action="../action/helper.php?action=update" method="post">
    <input type="text"  name="nama" placeholder="masukkan nama" value=<?php echo $x['nama']?>></br>
    <input type="text"  name="nim" placeholder="masukkan nim" value=<?php echo $x['nim']?>></br>
    <input type="text"  name="kelas" placeholder="masukkan kelas" value=<?php echo $x['kelas']?>></br>
    <input type="text"  name="angkatan" placeholder="masukkan angkatan" value=<?php echo $x['angkatan']?>></br>
    <input type="hidden" name="id" value=<?php echo $id?>>
    <input type="submit">
</form>

<?
}
?>