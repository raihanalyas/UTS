<?php
require_once "app/category.php";
require_once "app/post.php";

$kat = new App\post;
$cmb = new App\category;
$dat1 = $cmb->tampil();

if (isset($_POST['tsimpan'])) {
	$kat->tambah($_POST['post_cat_id'],
               $_POST['post_date'], 
               $_POST['post_slug'], 
               $_POST['post_tittle'],
               $_POST['post_text']);
  header("Location: index.php?halaman=post_tampil.php");
}

?>
<h2>INPUT DATA POST</h2>
	<table>
<form action="" method="POST">
    <tr>
      <th>ID KATEGORI</th>
      <td>
        <select name="post_cat_id">
          <?php foreach ($dat1 as $row ) { ?>
          <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
          <?php } ?>
        </select>
      </td>

    </tr>
    <tr>
			<th>TANGGAL</th>
			<td><input type="date" name="post_date"></td>
		</tr>
     <tr>
      <th>SLUG</th>
      <td><input type="text" name="post_slug"></td>
    </tr>
    <tr>
      <th>TITLE</th>
      <td><input type="text" name="post_tittle"></td>
    </tr>
    <tr>
      <th>KETERANGAN</th>
      <td><input type="text" name="post_text"></td>
    </tr>
		<tr>
			<th></th>
			<td><input class="tmbl" type="submit" name="tsimpan" value="TAMBAH"></td>
		</tr>
	</table>
</form>
