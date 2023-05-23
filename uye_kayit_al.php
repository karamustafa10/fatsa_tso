<!DOCTYPE html>
<html style=" background-color: #8a8583; ">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FATSA - TSO</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    </head>

    <body style=" background-color: #8a8583; ">
    
    <?php

        $server = 'localhost';
        $user = 'id20801385_root';
        $password = 'Fatsatso.123';
        $database = 'id20801385_fatsatso';
        $baglanti = mysqli_connect($server, $user, $password, $database);

        if (!$baglanti) {
            echo "MySQL sunucusuna bağlantı kurulamadı! </br>";
            echo "HATA: " . mysqli_connect_error();
            exit;
        }

        $uye_ad = $_POST['uye_ad'];
        $uye_soyad = $_POST['uye_soyad'];
        $uye_tel_no = $_POST['uye_tel_no'];
        $uye_mail = $_POST['uye_mail'];
        $uye_sifre = $_POST['uye_sifre'];

        // Kontrol sorgusu
        $kontrol_sql = "SELECT * FROM uyeler WHERE uye_ad = '$uye_ad' AND uye_soyad = '$uye_soyad' AND uye_tel_no = '$uye_tel_no' AND uye_mail = '$uye_mail' AND uye_sifre = '$uye_sifre'";
        $kontrol_sonuc = mysqli_query($baglanti, $kontrol_sql);

        if (mysqli_num_rows($kontrol_sonuc) > 0) {
            echo '<div class="container-xxl text-center">
                <br>
                <div class="alert alert-danger text-uppercase" role="alert">
                    <p>Bu kayıt zaten veritabanında mevcut!</p>
                </div>
                </div>
                <br>
                <div class="container-xxl text-center">
                <br>
                <a class="btn btn-dark" href="index.php" role="button">indexya Dön</a>
                </div>';
        } else {
            // Ekleme sorgusu
            $ekle_sql = "INSERT INTO uyeler (uye_ad, uye_soyad, uye_tel_no, uye_mail, uye_sifre) VALUES ('$uye_ad', '$uye_soyad', '$uye_tel_no', '$uye_mail', '$uye_sifre')";
            $ekle_sonuc = mysqli_query($baglanti, $ekle_sql);

            if (!$ekle_sonuc) {
                echo '<br>Hata: ' . mysqli_error($baglanti);
            } else {
                echo '<div class="container-xxl text-center">
                <br>
                <div class="alert alert-success text-uppercase" role="alert">
                    <p>ÜYELİĞİNİZ OLUŞTURULDU SN. '.$_POST['uye_ad'].' '.$_POST['uye_soyad'].' !</p>
                </div>
                </div>
                <br>
                <div class="container-xxl text-center">
                <br>
                <a class="btn btn-dark" href="index.php" role="button">Anasayfa Dön</a>
                </div>';
            }
        }


    ?>


    </body>
</html>
