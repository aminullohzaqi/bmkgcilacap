<?php
    include 'koneksi.php';

    $gempaBumi = mysqli_query($conn, "SELECT * FROM bmkgfiles WHERE id = 51");
    $resultGempaBumi = mysqli_fetch_array($gempaBumi);

    $data_api = file_get_contents('https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json');
    $result_api = json_decode($data_api, true);

    $shakemap = $result_api["Infogempa"]["gempa"]["Shakemap"];
    $date = $result_api["Infogempa"]["gempa"]["Tanggal"];
    $time = $result_api["Infogempa"]["gempa"]["Jam"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMKG Cilacap</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap@5.1.3.css">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a class="nav-link active" href="gempa-bumi.php">Gempa Bumi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aws-monitoring.php">AWS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        <div class="row d-flex justify-content-around">
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Informasi Gempa Bumi</h5>
                </div>
                <div class="content-subtitle">
                    <p><?php echo ("$date $time") ?></p>
                </div>
                <div class="card">
                    <img src="https://data.bmkg.go.id/DataMKG/TEWS/<?php echo $shakemap; ?>" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Informasi Gempa Bumi Jawa Tengah</h5>
                </div>
                <div class="content-subtitle">
                    <p><?php echo $resultGempaBumi[2] ?></p>
                </div>
                <div class="card">
                <object>
                        <iframe src="https://docs.google.com/viewer?url=https://bmkgcilacap.com/Files/<?php echo $resultGempaBumi[1] ?>&embedded=true" ></iframe>
                    </object>
                </div>
            </div>
        </div>
    </div>
    

    <script src="Assets/js/popper.min.js"></script>
    <script src="Assets/js/bootstrap@5.1.3.js"></script>
</body>
</html>