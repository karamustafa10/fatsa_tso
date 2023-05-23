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

    <br>
    
    <div class="container-xxl">
    <div class="card text-center w-auto mb-3" style="height: 650px;">
        <div class="card-body">
            <h1 class="card-title">Üyeler</h1>
            <br>
            <p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ÜYE ID</th>
                            <th scope="col">AD</th>
                            <th scope="col">SOYAD</th>
                            <th scope="col">MAİL</th>
                            <th scope="col">TEL NO</th>
                        </tr>
                    </thead>
                    <tbody>
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


                        $sql = "SELECT * FROM uyeler";
                        $result = $baglanti->query($sql);


                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $row["uye_id"] . "</th>";
                                echo "<td>" . $row["uye_ad"] . "</td>";
                                echo "<td>" . $row["uye_soyad"] . "</td>";
                                echo "<td>" . $row["uye_mail"] . "</td>";
                                echo "<td>" . $row["uye_tel_no"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Üye bulunamadı</td></tr>";
                        }


                        $baglanti->close();


                        ?>
                    </tbody>
                </table>
            </p>
        </div>
    </div>
</div>

<?php

    echo'<div class="container-xxl text-center">
        <br>
        <a class="btn btn-danger" href="uye_oturum_pasif.php" role="button">Oturumu Kapat</a>
        </div>';

?>

</body>

</html>