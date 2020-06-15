<?php
 require_once "app/post.php";
 require_once "app/photos.php";

 $id = $_GET['id'];
 $cmb = new App\post;
 $kat = new App\photos;
 $row1 = $kat->pilihdata($id);
 $dat1 = $cmb->tampil();
 $dat2 = $cmb->pilihdata($row1['pho_post_id']);

 if (isset($_POST['tsimpan'])){
   $kat->edit($id,$_POST['pho_post_id'],$_POST['pho_date'], $_POST['pho_tittle'], $_POST['pho_text']);
   header("Location: index.php?halaman=photso_tampil.php");

 }


 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=photos_tamppil.php");
 }

 ?>


<h2>EDIT DATA PHOTO</h2>
<form action="" method ="POST">
	<table>
      <tr>
        <th>ID POST</th>
        <td>
          <select name="pho_post_id">
            <option value="<?php echo $row1['pho_post_id']; ?>"><?php echo $dat2['post_tittle']; ?></option>
            <?php foreach ($dat1 as $row ) { ?>
            <option value="<?php echo $row['post_id']; ?>"><?php echo $row['post_tittle']; ?></option>
            <?php } ?>
          </select>
        </td>
		<tr>
			<th>TANGGAL</th>
			<td><input type="date" name="pho_date" value="<?php echo $row1['pho_date']; ?>"></td>
		</tr>
    <tr>
      <th>TITLE</th>
      <td><input type="text" name="pho_tittle" value="<?php echo $row1['pho_tittle']; ?>"></td>
    </tr>
     <tr>
      <th>KETERANGAN</th>
      <td><input type="text" name="pho_text" value="<?php echo $row1['pho_text']; ?>"></td>
    </tr>
		<tr>
			<th></th>
			<td>
        <input class="tmbl" type="submit" name="tsimpan" value="UBAH">
        <input class="tmbl" type="submit" name="thapus" value="HAPUS"></td>

		</tr>
	</table>
