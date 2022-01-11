<?php
    session_start();
    include 'koneksi.php';

    if(!$_SESSION["role"]){
        header('Location: login.php');
    }

    $prakiraanHujanLebat = mysqli_query($conn, "SELECT * FROM bmkgfiles WHERE id = 11");
    $resultPrakiraanHujanLebat = mysqli_fetch_array($prakiraanHujanLebat);

    $imgCitra = file_get_contents("http://202.90.198.22/IMAGE/ANIMASI/H08_EH_Jateng_m18.gif");
    file_put_contents("Files/citra.gif", $imgCitra);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMKG Cilacap</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap@5.1.3.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/slide-in.css">
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
                    <li class="nav-item">
                        <a class="nav-link" href="aws-monitoring.php">AWS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="content-jumbotron">
            <div class="container jumbotron-content">
                <img class="inline-photo-right show-on-scroll" style="height: 5em; width: auto; margin-top: 0.8em;" src="Assets/img/logo_bmkg.png">
                <div class="title-jumbotron inline-photo-left show-on-scroll" style="margin-left: 1.5em;">
                    <h1 class="display-4"><strong>BMKG Cilacap</strong></h1>
                    <p class="lead"><strong>Info Cuaca Khusus Pertamina dan Area 70</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container content">
        <div class="row d-flex justify-content-around">
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Citra Satelit Jawa Tengah</h5>
                </div>
                <div class="card">
                    <img src="Files/citra.gif" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Prakiraan Hujan lebat</h5>
                </div>
                <div class="card" id="cardContainer">
                    <iframe src="https://signature.bmkg.go.id/weather"></iframe>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Prakiraan Cuaca Cilacap Hari Ini</h5>
                </div>
                <div class="card">
                    <img src="http://cuacajateng.com/prakiraan/image/img_terkini/cilacap.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-title">
                    <h5>Prakiraan Cuaca Esok Hari</h5>
                </div>
                <div class="card">
                    <img src="http://cuacajateng.com/prakiraan/image/img_besok/cilacap.png" alt="">
                </div>
            </div>
        </div>
    </div>
    
    <script src="Assets/js/show-on-scroll.js"></script>
    <script src="Assets/js/popper.min.js"></script>
    <script src="Assets/js/bootstrap@5.1.3.js"></script>
</body>

<script>
    function showIframe(url, id){
        var URL = "https://docs.google.com/viewer?url=https://bmkgcilacap.com/Files/" + url + "&embedded=true";
        var count = 0;
        var iframe = ` <iframe id = "myIframe" src = "${URL}" frameborder = "0"></iframe>`;
                
        $(id).html(iframe);
            $('#myIframe').on('load', function(){ 
            count++;
            if(count>0){
                clearInterval(ref)
            }
        });

        var ref = setInterval(()=>{
            $(id).html(iframe);
            $('#myIframe').on('load', function() {
                count++;
                if (count > 0) {
                    clearInterval(ref)
                }
            });
        }, 4000)
    }

</script>
</html>