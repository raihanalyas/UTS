<?php
require_once "app/photos.php";
$kat = new App\photos;
$rows = $kat->tampil();

?>

<h2>DATA PHOTO</h2>
<form  method="post">
 <table>
   <tr>
     <th>ID FOTO</th>
     <th>FOTO</th>
     <th>ID POST</th>
     <th>TANGGAL</th>
     <th>TITLE</th>
     <th>KETERANGAN</th>
     <th>EDIT</th>
   </tr>

   <?php foreach ($rows as $row) { $id = $row['pho_id']; ?>
     <tr>
       <td><?php echo $row['pho_id']; ?></td>
       <td><img width="50px" height="50px" src="layout/assets/images/album/<?php echo $row['gambar']; ?>"></td>
       <td><?php echo $row['pho_post_id']; ?></td>
       <td><?php echo $row['pho_date']; ?></td>
       <td><?php echo $row['pho_tittle']; ?></td>
       <td><?php echo $row['pho_text']; ?></td>
       <td>
         <input class="tmbl" type="submit" name="edit<?php echo $id ?>" value="EDIT">
       <?php
           if (isset($_POST['edit'.$id])) {
               header("Location: index.php?halaman=photos_edit.php&id=$id");
             }

        ?>
       <input class="tmbl" type="submit" value="HAPUS" name="thapus<?php echo $id ?>">
       <?php
       if (isset($_POST['thapus'.$id]))
       {
         $kat->hapus($id);
         header("Location: index.php?halaman=photos_tampil.php&id=$d1");
       }
       ?>
     </td>
   </tr>

   <?php } ?>
 </table>
 <input class="tmbl" type="submit" name="tam" value="TAMBAH">
 <?php
   if (isset($_POST['tam'])) {
       header("Location: index.php?halaman=photos_input.php");
     }
 ?>
</form>
