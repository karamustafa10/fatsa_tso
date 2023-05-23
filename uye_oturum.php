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

    <div class=" container-fluid text-center " style="background-color: #475c6c"><h1 style=" color: white; "><br>&nbsp;FATSA TİCARET VE SANAYİ ODASI<br>ÜYE VE PERSONEL SİSTEMİ<br>&nbsp;</h1></div>
    
    <br>
    
    <div class="container-xxl">
        <div class="card text-center w-auto mb-3" style=" height: 450px; background-color: #f7efd2; border-color: #f7efd2; ">
            <div class="card-body">
                <h1 class="card-title">Üye Girişi</h1>
                <br>
                <p>
                    <form action="uye_oturum_aktif.php" method="POST">
                        
                        <div class="form-outline mb-4">
                            <input type="text" name="uye_ad" class="form-control" />
                            <label class="form-label" >AD</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="uye_soyad" class="form-control" />
                            <label class="form-label" >SOYAD</label>
                        </div>

                        
                        <div class="form-outline mb-4">
                            <input type="password" name="uye_sifre" class="form-control" />
                            <label class="form-label" >ŞİFRE</label>
                        </div>

                        <button type=" submit " class="btn btn-dark btn-block mb-4">Giriş Yap</button>

                    </form>
                </p>
            </div>
        </div>
    </div>

</body>

</html>