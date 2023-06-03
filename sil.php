<?php

include("pdo.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    echo $id."numaralı kitap Silindi.";
    header("Refresh:1; url=homepage.php");
    
    $sorgu = $conn->prepare("DELETE FROM ogrencibilgi WHERE ogrenciid = ?");
    $sorgu->execute(array($id));

    

    
}

?>