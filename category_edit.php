<?php
 require_once "app/category.php";
 $id = $_GET['id'];
 $kat = new App\category;
 $row = $kat->pilihdata($id);
 if (isset($_POST['tsimpan']))
 {
   $kat->edit($id,$_POST['cat_name'], $_POST['cat_text']);
     header("Location: index.php?halaman=category_tampil.php");

 }

 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=category_tampil.php");
 }

 ?>
<h2>EDIT DATA KATEGORI</h2>
<form action="" method ="POST">
	<table>
    <tr>
			<th>ID</th>
			<td><input readonly type="text" name="id" value="<?php echo $row['cat_id']; ?>"></td>
		</tr>
		<tr>
			<th>NAMA</th>
			<td><input type="text" name="cat_name" value="<?php echo $row['cat_name']; ?>"></td>
		</tr>
		<tr>
			<th>KETERANGAN</th>
			<td><input  type="text" name="cat_text" value="<?php echo $row['cat_text']; ?>"></td>
		</tr>
		<tr>
			<th></th>
			<td><input class="tmbl" type="submit" name="tsimpan" value="SIMPAN">
				<input class="tmbl" type="submit" name="thapus" value="HAPUS">
			</td>

		</tr>
	</table>
