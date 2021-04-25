<?php
include 'koneksi.php';
          $query = '';
          $table_data = '';
          $filename = "data.json";
          $data = file_get_contents($filename); 
          $array = json_decode($data, true); 
          foreach($array as $row) 
          {
           $query .= "INSERT INTO barang (nama, jenis, harga, stok) VALUES ('".$row["nama"]."', '".$row["jenis"]."', '".$row["harga"]."', '".$row["stok"]."'); ";  // Make Multiple Insert Query 
           $table_data .= '
            <tr>
               <td>'.$row["nama"].'</td>
               <td>'.$row["jenis"].'</td>
               <td>'.$row["harga"].'</td>
               <td>'.$row["stok"].'</td>
           </tr>
           '; 
          }
          if(mysqli_multi_query($koneksi, $query)) 
    {
     echo '<h3 style="text-align:center">Data berhasil masuk ke Database</h3><br />';
     echo '<table style="margin-left:auto;margin-right:auto" border="1">
        <tr>
         <th>Nama</th>
         <th>Jenis</th>
         <th>Harga</th>
         <th>Stok</th>
        </tr>';
     echo $table_data;  
     echo '</table>';
   }
?>