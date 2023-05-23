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

            $personel_ad = $_POST['personel_ad'];
            $personel_soyad = $_POST['personel_soyad'];
            $personel_sifre = $_POST['personel_sifre'];


            $sql = "SELECT * FROM personeller WHERE personel_ad = '$personel_ad' AND personel_soyad = '$personel_soyad' AND personel_sifre = '$personel_sifre'";
            $result = $baglanti->query($sql);

            // Sonuç kontrolü
            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();

                session_start();

                $_SESSION['personel_id'] = $row['personel_id'];
                $_SESSION['personel_ad'] = $row['personel_ad'];
                $_SESSION['personel_soyad'] = $row['personel_soyad'];
                $_SESSION['personel_sifre'] = $row['personel_sifre'];

                echo '<div class="container-xxl text-center">
                            <br>
                            <div class="alert alert-success text-uppercase" role="alert">
                                <p>HOŞ GELDİNİZ SN. '.$row['personel_ad'].' '.$row['personel_soyad'].' !</p>
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
                                                <br>
                                                <br>
                                                <h1 class="card-title">*PERSONEL BİLGİLERİNİZ*</h1>
                                                <h5 class="card-text">Aşağıda en son güncel hali olarak personel bilgileriniz bulunmaktadır.</h5>
                                                <p>ADI : '.$row['personel_ad'].'</p>
                                                <p>SOYADI : '.$row['personel_soyad'].'</p>
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
                                                <h1 class="card-title">*ÜYELERİ GÖRÜNTÜLE*</h1>
                                                <h5 class="card-text">Aktif olan üyeleri görmek için aşağıdaki butona tıklayınız.</h5>
                                                <br>
                                                <p><a href="uye_listele.php" class="btn btn-dark" >Üyeleri Görüntüle</a></p>
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

            } 

            else {
            
                echo'

                            <div class="container-xxl text-center">
                            <br>
                            <div class="alert alert-danger text-uppercase" role="alert">
                                <p>YANLIŞ AD, SOYAD YA DA ŞİFRE !</p>
                            </div>
                            </div>

                            <br>

                            <div class="container-xxl text-center">
                            <br>
                            <a class="btn btn-dark" href="personel_oturum.php" role="button">Tekrar Giriş Yapmayı Dene</a>
                            </div>

                        ';

            }


        ?>
    </body>
</html>


