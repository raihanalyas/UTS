<?php
require_once "app/photos.php";
require_once "app/album.php";
$cmb = new App\photos;
$kat = new App\album;
$dat1 = $cmb->tampil();

if (isset($_POST['tsimpan'])) {
  $kat->tambah($_POST['album_pho_id'],$_POST['album_name'], $_POST['album_text'] );
  header("Location: index.php?halaman=album_tampil.php");
}

?>
<h2>INPUT DATA ALBUM</h2>
  <table>
<form action="" method="POST">
    <tr>
      <th>ID FOTO</th>
      <td>
        <select name="album_pho_id">
          <?php foreach ($dat1 as $row ) { ?>
          <option value="<?php echo $row['pho_id']; ?>"><?php echo $row['pho_tittle']; ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
      <th>NAMA ALBUM</th>
      <td><input type="text" name="album_name"></td>
    </tr>
    <tr>
      <th>KETERANGAN</th>
      <td><input type="text" name="album_text"></td>
    </tr>
    <tr>
      <th></th>
      <td><input class="tmbl" type="submit" name="tsimpan" value="TAMBAH"></td>
    </tr>
  </table>
</form>
