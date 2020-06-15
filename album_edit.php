<?php
 require_once "app/photos.php";
 require_once "app/album.php";
 $id = $_GET['id'];
 $cmb = new App\photos;
 $kat = new App\album;
 $row1 = $kat->pilihdata($id);
 $dat1 = $cmb->tampil();
 $dat2 = $cmb->pilihdata($row1['album_pho_id']);

 if (isset($_POST['tsimpan'])){
   $kat->edit($id,$_POST['album_pho_id'], $_POST['album_name'], $_POST['album_text']);
   header("Location: index.php?halaman=album_tampil.php");

 }
 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=album_tampil.php");
 }

 ?>
<h2>EDIT DATA ALBUM</h2>
<form action="" method ="POST">
	<table>
      <tr>
        <th>ID FOTO</th>
        <td>
          <select name="album_pho_id">
            <option value="<?php echo $row1['album_pho_id']; ?>"><?php echo $dat2['pho_tittle']; ?></option>
            <?php foreach ($dat1 as $row ) { ?>
            <option value="<?php echo $row['pho_id']; ?>"><?php echo $row['pho_tittle']; ?></option>
            <?php } ?>
          </select>
        </td>
    <tr>
      <th>NAMA ALBUM</th>
      <td><input type="text" name="album_name" value="<?php echo $row1['album_name']; ?>"></td>
    </tr>
     <tr>
      <th>KETERANGAN</th>
      <td><input type="text" name="album_text" value="<?php echo $row1['album_text']; ?>"></td>
    </tr>
		<tr>
			<th></th>
			<td>
        <input class="tmbl" type="submit" name="tsimpan" value="UBAH">
        <input class="tmbl" type="submit" name="thapus" value="HAPUS"></td>

		</tr>
	</table>
