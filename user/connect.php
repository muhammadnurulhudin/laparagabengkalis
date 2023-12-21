<?php
// deklarasi parameter yangdibutuhkan
$server = "localhost";
$user = "root";
$pass = "";
$db = "laparaga_bks";
$koneksi = mysqli_connect($server, $user, $pass, $db);
// if(!$koneksi)
// {echo("koneksi gagal");}
// else
// {echo("koneksi berhasil");}
if (!$koneksi)
{ die("koneksi Gagal error : " . mysqli_connect_error());}
?>