<?php
require_once "app/category.php";

$kat = new App\category;
$rows = $kat->tampil();

?>

<h2>Data Kategori</h2>
<form method="post">
	<table>
		<tr>
			<th>ID</th>
			<th>NAMA</th>
			<th>KETERANGAN</th>
			<th>EDIT</th>
		</tr>

		<?php foreach ($rows as $row) { $id = $row['cat_id']; ?>

		<tr>
			<td><?php echo $row['cat_id']; ?></td>
			<td><?php echo $row['cat_name']; ?></td>
			<td><?php echo $row['cat_text']; ?></td>
			<td>
				<input class="tmbl" type="submit" name="edit<?php echo $id?>" value="EDIT">
				<?php 
					if (isset($_POST ['edit'.$id]))
					{
						header("Location:index.php?halaman=category_edit.php&id=$id");
					}
				 ?>

				 <input class="tmbl" type="submit" name="thapus<?php echo $id?>" value="HAPUS">
				 <?php 
					if (isset($_POST ['thapus'.$id]))
					{
						$kat->hapus($id);
						header("Location:index.php?halaman=category_tampil.php&id=$d1");
					}
				 ?>
			</td>
		</tr>

		<?php } ?>
	</table>
	<input class="tmbl" type="submit" name="tam" value="TAMBAH">
	 <?php
	   if (isset($_POST['tam'])) {
	       header("Location: index.php?halaman=category_input.php");
	     }
	 ?>

</form>