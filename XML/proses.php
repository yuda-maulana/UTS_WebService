<?php
include ('koneksi.php');
$xml = simplexml_load_file('data.xml'); 
foreach( $xml->children() as $mahasiswa ) 
{
$nama = $mahasiswa->nama; 
$jurusan = $mahasiswa->jurusan; 
$angkatan = $mahasiswa->angkatan; 
$alamat = $mahasiswa->alamat; 
echo 'Nama : '.$nama.'<br />';
echo 'Jurusan : '.$jurusan.'<br />';
echo 'Angkatan : '.$angkatan.'<br />';
echo 'Alamat : '.$alamat.'<br />';
echo '<br>';
$query = "INSERT INTO tbl_mahasiswa
        VALUES ('', '$nama', '$jurusan', '$angkatan', '$alamat') ";
$result = mysqli_query($koneksi, $query);
}
if ($result) {
    echo '<h2>Data XML berhasil di simpan ke Database </h2>';
    } else echo '<h2>Data XML gagal di simpan ke Database</h2>';
?>
