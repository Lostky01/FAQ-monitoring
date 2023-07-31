<?php
	include 'koneksi.php';
 
	echo "<option value=''>Aldi Fadilah</option>";
	echo "<option value=''>Bayu Firdaus Bagaskara</option>";
	echo "<option value=''>Fahmi Heidy Herdiansyah</option>";
	echo "<option value=''>Fadilah Eka Prasetiyo</option>";
	echo "<option value=''>Migent D. Adityabrima</option>";
	echo "<option value=''>Henny</option>";
 
	$query = "SELECT * FROM cases ORDER BY user ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
	}
?>