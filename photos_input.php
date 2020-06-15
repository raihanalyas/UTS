<?php
require_once "app/post.php";
require_once "app/photos.php";
$cmb = new App\post;
$kat = new App\photos;
$dat1 = $cmb->tampil();

if (isset($_POST['tsimpan'])) {
  $kat->tambah($_POST['pho_post_id'],$_POST['pho_date'], $_POST['pho_tittle'], $_POST['pho_text'], $_GET['gambar']);
  header("Location: index.php?halaman=photos_tampil.php");
}

if (isset($_POST['up'])) {
  $nama = $_FILES['gambar']['name'];
  $tmp = $_FILES['gambar']['tmp_name'];
  $path = "layout/assets/images/album/".$nama;
  move_uploaded_file($tmp, $path);
  header("location:index.php?halaman=photos_input.php&gambar=$nama");
}



?>
<h2>INPUT DATA PHOTO</h2>
  <table>

    <tr>
      <th>FOTO</th>
      <td>
      <form method="POST" enctype="multipart/form-data" action="">
        <?php if (isset($_GET['gambar'])) { ?>
          <img src="layout/assets/images/album/<?php echo $_GET['gambar']; ?>" height="100px" width="100px">
        <?php } else { ?>
          <input type="file" name="gambar">
          <input class="tmbl" type="submit" value="Upload" name="up">
        <?php } ?>
      </form>
      </td>
    </tr>

<form action="" method="POST">
    <tr>
      <th>ID POST</th>
      <td>
        <select name="pho_post_id">
          <?php foreach ($dat1 as $row ) { ?>
          <option value="<?php echo $row['post_id']; ?>"><?php echo $row['post_tittle']; ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
   
    <tr>
      <th>TANGGAL</th>
      <td><input type="date" name="pho_date"></td>
    </tr>
    <tr>
      <th>TITLE</th>
      <td><input type="text" name="pho_tittle"></td>
    </tr>
    <tr>
      <th>KETERANGAN</th>
      <td><input type="text" name="pho_text"></td>
    </tr>
    <tr>
      <th></th>
      <td><input class="tmbl" type="submit" name="tsimpan" value="TAMBAH"></td>
    </tr>
  </table>
</form>
