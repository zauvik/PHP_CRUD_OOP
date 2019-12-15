<?php
include '../action/database.php';
$db = new database(); //membuat instance dari class database pada file database.php
?>
<h1>CRUD OOP PHP</h1>
<h3>Data User</h3>
 
<a href="insert.php">Input Data</a>
<table border="1">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>NIM</th>
		<th>Kelas</th>
		<th>Angkatan</th>
        <th>Action</th>
	</tr>
	<?php
	$no = 1;
	foreach($db->show() as $x){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $x['nama']; ?></td>
		<td><?php echo $x['nim']; ?></td>
		<td><?php echo $x['kelas']; ?></td>
        <td><?php echo $x['angkatan']; ?></td>
		<td>
			<a href="update.php?id=<?php echo $x['id']; ?>">Update</a>
			<a href="../action/helper.php?id=<?php echo $x['id']; ?>&action=delete">Delete</a>
		</td>
	</tr>
	<?php 
	}
	?>
</table>
