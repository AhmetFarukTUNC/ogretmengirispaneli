<?php 
include("baglanti.php"); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ogrenci Otomasyonu</title>
    <link rel="stylesheet" href="./homepage.css">
</head>
<body>
    <div>
        <nav>
            <form action="homepage.php" method="post">
                <table>
                    <tr>
                        <td><h4 style="color:red;font-size: 30px;padding-left: 625px;">Öğrenci Bilgileri</h4></td>    
                    </tr>
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;color:white" placeholder="Öğrenci Adı" required name="kitapadi"></td>
                    </tr>
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;margin-top: 30px;color:white" placeholder="Öğrenci No" name="kitapyazari"></td>
                    </tr>
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;margin-top: 30px;color:white" placeholder ="Ders" name="yayinlanmatarihi"></td>
                    </tr>
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;margin-top: 30px;color:white" placeholder="Vize" name="kitapturu"></td>
                    </tr>
                    <tr>
                        <td><input type="text" style="background-color: gray;font-size: 20px;width:300px;height:30px;margin-left: 575px;margin-top: 30px;color:white" placeholder="Final" name="yayinevi"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Onayla" style="background-color: green;width: 300px;font-size: 20px;color: white;height:40px;border-radius: 30px;margin-top:30px;margin-left: 575px;"></td>
                    </tr> 

                    
                </table>
            </form>
            <?php
                   $ogrenciler = mysqli_query($baglanti,"SELECT * FROM ogrencibilgi");
                   
                ?>
            <table border="1" style="background-color:green;margin-top:50px;margin-left: 500px;">
                <tr>
                        <th>Sil</th>
                        <th>Öğrenci Id</th>
                        <th>Öğrenci adı</th>
                        <th>Öğrenci No</th>
                        <th>Ders</th>
                        <th>Vize</th>
                        <th>Final</th>
                        <th>Güncelle</th>
                </tr>
                <?php
                foreach ($ogrenciler as $ogrenciler) {?>
                       <tr>
                       <td>
                       <a onclick="sil(<?=$ogrenciler['ogrenciid']?>)" >Sil</a>
                       </td>
                       <td>
                       <?=$ogrenciler["ogrenciid"];?>
                       </td>
                       <td>
                       <?=$ogrenciler["ogrenciadi"];?>
                       </td>
                       <td>
                       <?=$ogrenciler["ogrencino"];?>
                       </td>
                       <td>
                       <?=$ogrenciler["ders"];?>
                       </td>
                       <td>
                       <?=$ogrenciler["vize"];?>
                       </td>
                       <td>
                       <?=$ogrenciler["final"];?>
                       </td>
                       <td>
                       <a onclick="guncelle(<?=$ogrenciler['ogrenciid']?>)">Güncelle</a>
                       </td>
                       </tr>

                       
                       
                
                <?php
            }
            ?>
                
                
            </table>
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">

        function sil(id){
            alert(id+" numaralı kitap seçtiniz.")
            Swal.fire({
  title: 'Silmek istediğine emin misin?',
  text: "Bu kitap silinecektir.",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: 'red',
  cancelButtonText:"Hayır",
  confirmButtonText: 'Evet'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Veri silindi',
      'Sayfaya dönmek için tıklayın.',
      'success'

    )
    window.location.href="sil.php?id="+id;

    
  }
})
        }

        function guncelle(id){
            alert(id+" numaralı kitap güncellenecektir.")
            Swal.fire({
  title: 'Güncellemek istediğine emin misin?',
  text: "Bu kitap güncellenecektir.",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: 'red',
  cancelButtonText:"Hayır",
  confirmButtonText: 'Evet'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Veri güncellendi',
      'Sayfaya dönmek için tıklayın.',
      'success'

    )
    window.location.href="guncelle.php?id="+id;

    
  }
})
        }
    
</script>
</body>
</html>

<?php



   

   if (isset($_POST["kitapadi"],$_POST["kitapyazari"],$_POST["yayinlanmatarihi"],$_POST["kitapturu"],$_POST["yayinevi"])) {
    
    $kitapadi = $_POST["kitapadi"];

    $kitapyazari = $_POST["kitapyazari"];

    $yayinlanmatarihi = $_POST["yayinlanmatarihi"];

    $kitapturu = $_POST["kitapturu"];

    $yayinevi = $_POST["yayinevi"];

    $ekle = "INSERT INTO ogrencibilgi (ogrenciadi,ogrencino,ders,vize,final) VALUES ('".$kitapadi."','".$kitapyazari."','".$yayinlanmatarihi."','".$kitapturu."','".$yayinevi."')";
    $calistirekle = mysqli_query($baglanti,$ekle);
    if ($calistirekle===TRUE) {
       echo "<script>alert('Yeni öğrenci bilgileri kaydedilmiştir.')</script>";
       
       
    }

    
    


   }

?>