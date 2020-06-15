<?php
require_once "app/post.php";

$kat = new App\post;
$rows = $kat->tampil();

?>
<h2>Data Post</h2>
<form  method="post">
 <table>
   <tr>
     <th>ID POST</th>
     <th>ID KATEGORI</th>
     <th>TANGGAL</th>
     <th>SLUG</th>
     <th>TITLE</th>
     <th>KETERANGAN</th>
     <th>EDIT</th>
   </tr>

   <?php foreach ($rows as $row) { $id = $row['post_id']; ?>
     <tr>
       <td><?php echo $row['post_id']; ?></td>
       <td><?php echo $row['post_cat_id']; ?></td>
       <td><?php echo $row['post_date']; ?></td>
       <td><?php echo $row['post_slug']; ?></td>
       <td><?php echo $row['post_tittle']; ?></td>
       <td><?php echo $row['post_text']; ?></td>
       <td>
         <input class="tmbl" type="submit" name="edit<?php echo $id ?>" value="EDIT">
       <?php
           if (isset($_POST['edit'.$id])) {
               header("Location: index.php?halaman=post_edit.php&id=$id");
             }

        ?>
       <input class="tmbl" type="submit" value="HAPUS" name="thapus<?php echo $id ?>">
       <?php
       if (isset($_POST['thapus'.$id]))
       {
         $kat->hapus($id);
         header("Location: index.php?halaman=post_tampil.php&id=$d1");
       }
       ?>
     </td>
   </tr>

   <?php } ?>
 </table>
 <input class="tmbl" type="submit" name="tam" value="TAMBAH">
 <?php
   if (isset($_POST['tam'])) {
       header("Location: index.php?halaman=post_input.php");
     }
 ?>
</form>
