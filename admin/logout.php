<?php
session_start();
session_destroy();
echo "<script>alert ('Anda sudah keluar');</script>";
echo "<script>location='../index.php';</script>";
?>
