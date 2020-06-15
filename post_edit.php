<?php
 require_once "app/post.php";
 require_once "app/category.php";

 $id = $_GET['id'];
 $kat = new App\post;
  $cmb = new App\category;
 $row1 = $kat->pilihdata($id);
 $dat1 = $cmb->tampil();
 $dat2 = $cmb->pilihdata($row1['post_cat_id']);

 if (isset($_POST['tsimpan'])){
   $kat->edit($id,$_POST['post_cat_id'],
                  $_POST['post_date'], 
                  $_POST['post_slug'], 
                  $_POST['post_tittle'], 
                  $_POST['post_text']);
   header("Location: index.php?halaman=post_tampil.php");
 }

 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=post_tampil.php");
 }

 ?>
<h2>EDIT DATA POST</h2>
<form action="" method ="POST">
	<table>
      <tr>
        <th>ID KATEGORI</th>
        <td>
          <select name="post_cat_id">
            <option value="<?php echo $row1['post_cat_id']; ?>"><?php echo $dat2['cat_name']; ?></option>
            <?php foreach ($dat1 as $row ) { ?>
            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
            <?php } ?>
          </select>
        </td>
		<tr>
			<th>TANGGAL</th>
			<td><input type="date" name="post_date" value="<?php echo $row1['post_date']; ?>"></td>
		</tr>
    <tr>
      <th>SLUG</th>
      <td><input type="text" name="post_slug" value="<?php echo $row1['post_slug']; ?>"></td>
    </tr>
    <tr>
      <th>TITLE</th>
      <td><input type="text" name="post_tittle" value="<?php echo $row1['post_tittle']; ?>"></td>
    </tr>
     <tr>
      <th>KETERANGAN</th>
      <td><input type="text" name="post_text" value="<?php echo $row1['post_text']; ?>"></td>
    </tr>
		<tr>
			<th></th>
			<td><input class="tmbl" type="submit" name="tsimpan" value="UBAH">
          <input class="tmbl" type="submit" name="thapus" value="HAPUS"></td>

		</tr>
	</table>
