<?php
    session_start();
    include 'koneksi.php';

    if(!$_SESSION["role"]){
        header('Location: login.php');
    }

    $dateNow = date('Ymd');
    $dateBefore = date('Ymd', strtotime('-1 day', strtotime($dateNow)));

    $splitYear = str_split($dateBefore,4);
    $year = $splitYear[0];

    $splitMonth = str_split($splitYear[1], 2);
    $month = $splitMonth[0];

    $day = date('d');

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
    <meta name="Description" content="Informasi Cuaca Perairan Cilacap">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMKG Cilacap</title>
    <link rel="icon" type="image/x-icon" href="Assets/img/logo_bmkg.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap@5.1.3.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/index.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="#">
                <div class="brand-logo">
                    <img style="height: 30px;" src="Assets/img/logo_bmkg.png" alt="BMKG Cilacap">
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
                    <h5>Prakiraan Cuaca Perairan</h5>
                </div>
                <div class="content-subtitle">
                    <p><?php echo ("$year-$month-$day"); ?></p>
                </div>
                <div class="card">
                    <img src="https://peta-maritim.bmkg.go.id/render-static/w3g/<?php echo $year; ?>/<?php echo $month; ?>/<?php echo $dateBefore; ?>12/cilacap/swh.gif" alt="BMKG Cilacap">
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Prakiraan Cuaca Pelabuhan Laut</h5>
                </div>
                <div class="content-subtitle">
                    <p><?php echo $resultPrakiraanCuacaPelabuhanLaut[2] ?></p>
                </div>
                <div class="card" id="pelabuhanLaut">
                    
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Prakiraan Cuaca Pelabuhan</h5>
                </div>
                <div class="content-subtitle">
                    <p><?php echo $resultPrakiraanCuacaPelabuhan[2] ?></p>
                </div>
                <div class="card" id="pelabuhan">

                </div>
            </div>
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Prakiraan Cuaca Wilayah Pelayanan</h5>
                </div>
                <div class="content-subtitle">
                    <p><?php echo $resultPrakiraanCuacaWilayahPelayanan[2] ?></p>
                </div>
                <div class="card" id="wilayahPelayanan">

                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-start">
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Pasang Surut</h5>
                </div>
                <div class="content-subtitle">
                    <p><?php echo $resultPasangSurut[2] ?></p>
                </div>
                <div class="card" id="pasangSurut">

                </div>
            </div>
        </div>
    </div>
    

    <script src="Assets/js/popper.min.js"></script>
    <script src="Assets/js/bootstrap@5.1.3.js"></script>
</body>
<script>
    function showIframe(url, id, iframeTag, iframeId){
        var URL = "https://docs.google.com/viewer?url=https://bmkgcilacap.com/Files/" + url + "&embedded=true";
        var count = 0;
        var iframe = `<iframe id =` + iframeId + ` src = "${URL}" frameborder = "0"></iframe>`;
                
        $(id).html(iframe);
            $(iframeTag).on('load', function(){ 
            count++;
            if(count>0){
                clearInterval(ref)
            }
        });

        var ref = setInterval(()=>{
            $(id).html(iframe);
            $(iframeTag).on('load', function() {
                count++;
                if (count > 0) {
                    clearInterval(ref)
                }
            });
        }, 6000)
    }

    showIframe("<?php echo $resultPrakiraanCuacaPelabuhanLaut[1] ?>", "#pelabuhanLaut", "#iframePLaut", "iframePLaut");
    showIframe("<?php echo $resultPrakiraanCuacaPelabuhan[1] ?>", "#pelabuhan", "#iframePelabuhan", "iframePelabuhan");
    showIframe("<?php echo $resultPrakiraanCuacaWilayahPelayanan[1] ?>", "#wilayahPelayanan", "#iframeWPelayanan", "iframeWPelayanan");
    showIframe("<?php echo $resultPasangSurut[1] ?>", "#pasangSurut", "#iframePasut", "iframePasut");
</script>
</html>