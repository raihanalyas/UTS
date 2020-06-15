<?php
require_once "app/album.php";
$kat = new App\album;
$rows = $kat->tampil();

?>
<h2>DATA ALBUM</h2>
<form  method="post">
 <table>
   <tr>
     <th>ID ALBUM</th>
     <th>ID FOTO</th>
     <th>NAMA ALBUM</th>
     <th>KETERANGAN</th>
     <th>EDIT</th>
   </tr>

   <?php foreach ($rows as $row) { $id = $row['album_id']; ?>
     <tr>
       <td><?php echo $row['album_id']; ?></td>
       <td><?php echo $row['album_pho_id']; ?></td>
       <td><?php echo $row['album_name']; ?></td>
       <td><?php echo $row['album_text']; ?></td>
       <td>
         <input  class="tmbl" type="submit" name="edit<?php echo $id ?>" value="EDIT">
       <?php
           if (isset($_POST['edit'.$id])) {
               header("Location: index.php?halaman=album_edit.php&id=$id");
             }

        ?>
       <input class="tmbl" type="submit" value="HAPUS" name="thapus<?php echo $id ?>">
       <?php
       if (isset($_POST['thapus'.$id]))
       {
         $kat->hapus($id);
         header("Location: index.php?halaman=album_tampil.php&id=$d1");
       }
       ?>
     </td>
   </tr>

   <?php } ?>
 </table>
 <input  class="tmbl" type="submit" name="tam" value="TAMBAH">
 <?php
   if (isset($_POST['tam'])) {
       header("Location: index.php?halaman=album_input.php");
     }
 ?>
</form>
