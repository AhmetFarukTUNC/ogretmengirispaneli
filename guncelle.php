<?php
include("pdo.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Güncelle</title>
</head>
<body>
    <?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $gelenogrenci = $conn->query("SELECT * FROM ogrencibilgi WHERE ogrenciid = $id")->fetch(PDO::FETCH_ASSOC);

    }
    ?>
<table>
    
<table>
                    <tr>
                        <td><h4 style="color:red;font-size: 30px;padding-left: 625px;">Öğrenci Bilgileri</h4></td>    
                    </tr>
                    <form action="#" method="post">
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;color:white;" placeholder="Öğrenci id" required name="ogrenciid" value="<?=$gelenogrenci["ogrenciid"]?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;color:white;margin-top:30px;" placeholder="Öğrenci Adı" required name="ogrenciadi" value="<?= $gelenogrenci["ogrenciadi"]?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;margin-top: 30px;color:white" placeholder="Öğrenci No" name="ogrencino" value="<?=$gelenogrenci["ogrencino"]?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;margin-top: 30px;color:white" placeholder ="Ders" name="ders" value="<?=$gelenogrenci["ders"]?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;margin-top: 30px;color:white" placeholder="Vize" name="vize" value="<?=$gelenogrenci["vize"]?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;margin-top: 30px;color:white" placeholder="Final" name="final" value="<?=$gelenogrenci["final"]?>"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Güncelle" style="background-color: green;width: 300px;font-size: 20px;color: white;height:40px;border-radius: 30px;margin-top:30px;margin-left: 575px;"></td>
                    </tr> 

                    
                </table>
                </form>
                <?php
                if(isset($_POST["ogrenciadi"]) && isset($_POST["ogrencino"]) && isset($_POST["ders"]) && isset($_POST["vize"]) && isset($_POST["final"])){
                    $id = $_POST["ogrenciid"];
                    $ogrenciadi = $_POST["ogrenciadi"];
                    $ogrencino = $_POST["ogrencino"];
                    $ders = $_POST["ders"];
                    $vize = $_POST["vize"];
                    $final = $_POST["final"];
                    $sorgu = $conn->prepare("UPDATE ogrencibilgi SET ogrenciadi=?,ogrencino=?,ders=?,vize=?,final=? WHERE ogrenciid=$id");

                    $sorgu->execute(array($ogrenciadi,$ogrencino,$ders,$vize,$final));
                    header("Refresh:1; url=homepage.php");

                }
                ?>
</body>
</html>