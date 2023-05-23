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

        session_start();

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
        $uye_id = $_SESSION['uye_id'];


        // Güncelleme sorgusu
        $sql = "UPDATE uyeler SET uye_ad = '$uye_ad', uye_soyad = '$uye_soyad', uye_tel_no = '$uye_tel_no', uye_mail = '$uye_mail', uye_sifre = '$uye_sifre' WHERE uye_id = $uye_id";
        $guncelle = mysqli_query($baglanti, $sql);

        $sql = "SELECT * FROM uyeler WHERE uye_ad = '$uye_ad' AND uye_soyad = '$uye_soyad' AND uye_sifre = '$uye_sifre'";
            $result = $baglanti->query($sql);


                $row = $result->fetch_assoc();

                $_SESSION['uye_id'] = $row['uye_id'];
                $_SESSION['uye_ad'] = $row['uye_ad'];
                $_SESSION['uye_soyad'] = $row['uye_soyad'];
                $_SESSION['uye_tel_no'] = $row['uye_tel_no'];
                $_SESSION['uye_mail'] = $row['uye_mail'];
                $_SESSION['uye_sifre'] = $row['uye_sifre'];

                echo '<div class="container-xxl text-center">
                            <br>
                            <div class="alert alert-success text-uppercase" role="alert">
                                <p>HOŞ GELDİNİZ SN. '.$row['uye_ad'].' '.$row['uye_soyad'].' !</p>
                            </div>
                            </div>

                            <br>

                            <div class="container-fluid text-center align-items-center ">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="card text-center w-auto mb-3" style=" height: 450px; background-color: #f7efd2;">
                                            <div class="card-body ">
                                                <br>
                                                <br>
                                                <br>
                                                <h1 class="card-title">*ÜYELİK BİLGİLERİNİZ*</h1>
                                                <h5 class="card-text">Aşağıda en son güncel hali olarak üyelik bilgileriniz bulunmaktadır.</h5>
                                                <p>ADI : '.$row['uye_ad'].'</p>
                                                <p>SOYADI : '.$row['uye_soyad'].'</p>
                                                <p>TELEFON NUMARASI : '.$row['uye_tel_no'].'</p>
                                                <p>MAİLİ : '.$row['uye_mail'].'</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card text-center w-auto mb-3" style=" height: 450px; background-color: #eed7a1;">
                                            <div class="card-body ">
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <h1 class="card-title">*ÜYELİK BİLGİLERİNİ GÜNCELLE*</h1>
                                                <h5 class="card-text">Aktif olan üyeliğinizde üyelik bilgilerinizden birini ya da birden fazlasını güncellemek istiyorsanız aşağıdaki butona tıklayınız.</h5>
                                                <br>
                                                <p><a href="uye_guncelle.php" class="btn btn-dark" >Üyelik Bilgilerini Güncelle</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="container-xxl text-center">
                            <br>
                            <a class="btn btn-danger" href="uye_oturum_pasif.php" role="button">Oturumu Kapat</a>
                            </div>

                            ';



    ?>

    </body>
</html>