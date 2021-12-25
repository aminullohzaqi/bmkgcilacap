<?php
    include 'koneksi.php';

    $prakiraanCuacaWilayahPelayanan = mysqli_query($conn, "SELECT * FROM bmkgfiles WHERE id = 31");
    $resultPrakiraanCuacaWilayahPelayanan = mysqli_fetch_array($prakiraanCuacaWilayahPelayanan);

    $prakiraanCuacaPelabuhanLaut = mysqli_query($conn, "SELECT * FROM bmkgfiles WHERE id = 32");
    $resultPrakiraanCuacaPelabuhanLaut = mysqli_fetch_array($prakiraanCuacaPelabuhanLaut);

    $prakiraanCuacaPelabuhan = mysqli_query($conn, "SELECT * FROM bmkgfiles WHERE id = 33");
    $resultPrakiraanCuacaPelabuhan = mysqli_fetch_array($prakiraanCuacaPelabuhan);

    $pasangSurut = mysqli_query($conn, "SELECT * FROM bmkgfiles WHERE id = 34");
    $resultPasangSurut = mysqli_fetch_array($pasangSurut);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMKG Cilacap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Assets/css/index.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="#">
                <div class="brand-logo">
                    <img style="height: 30px;" src="Assets/img/logo_bmkg.png">
                    <h5 style="margin-left: 10px; margin-top: 3px">BMKG Cilacap</h5>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Prakiraan Cuaca
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php">Prakiraan Cuaca Cilacap</a></li>
                            <li><a class="dropdown-item" href="prakicu-pertamina.php">Prakiraan Cuaca Kilang Pertamina</a></li>
                            <li><a class="dropdown-item" href="prakicu-pelabuhan.php">Prakiraan Cuaca Pelabuhan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="peringatan-dini.php">Peringatan Dini</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gempa-bumi.php">Gempa Bumi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        <div class="row d-flex justify-content-around">
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Prakiraan Cuaca Wilayah Pelayanan</h5>
                </div>
                <div class="card">
                <iframe src="Files/<?php echo $resultPrakiraanCuacaWilayahPelayanan[1] ?>"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Prakiraan Cuaca Pelabuhan Laut</h5>
                </div>
                <div class="card">
                    <iframe src="Files/<?php echo $resultPrakiraanCuacaPelabuhanLaut[1] ?>"></iframe>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Prakiraan Cuaca Pelabuhan</h5>
                </div>
                <div class="card">
                    <iframe src="Files/<?php echo $resultPrakiraanCuacaPelabuhan[1] ?>"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Pasang Surut</h5>
                </div>
                <div class="card">
                    <iframe src="Files/<?php echo $resultPasangSurut[1] ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>