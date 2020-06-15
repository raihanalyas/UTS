<?php
require_once "app/category.php";
$kat = new App\category;

if (isset($_POST['tsimpan'])) {
	$kat->tambah($_POST['cat_name'], $_POST['cat_text']);
  header("Location: index.php?halaman=category_tampil.php");
}

?>
<h2>INPUT DATA KATEGORI</h2>
	<table>
<form action="" method="POST">
    <tr>
      <th>NAMA</th>
      <td><input type="text" name="cat_name"></td>
    </tr>
    <tr>
			<th>KETERANGAN</th>
			<td><input type="text" name="cat_text"></td>
		</tr>
		<tr>
			<th></th>
			<td><input class="tmbl" type="submit" name="tsimpan" value="TAMBAH"></td>
		</tr>
	</table>
</form>
