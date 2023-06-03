<?php
$mysqlsunucu = "localhost";
$mysqlkullanici = "root";
$mysqlsifre = "";
$vt="hakanhocaprojelogin";
try {
    $conn = new PDO("mysql:host=$mysqlsunucu;dbname=$vt;charset=utf8", $mysqlkullanici, $mysqlsifre);

    }
catch(PDOException $e)
    {
    echo "Bağlantı hatası: " . $e->getMessage();
    }
?>