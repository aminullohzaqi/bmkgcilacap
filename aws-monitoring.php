<?php
    include 'koneksi.php';

    $data_api = file_get_contents('http://202.90.199.132/aws-new/data/station/latest/5000000060');
    $result_api = json_decode($data_api, true);

    function statusAws($result){
        if($result == "0"){
            echo '<h4 style="color: red; text-align: right;">Offline</h4>';
        } else{
            echo '<h4 style="color: green; text-align: right;">Online</h4>';
        }
    }

    function getTime(){
        global $conn;
        $queryDb = mysqli_query($conn, "SELECT time FROM awsdata ORDER BY id ASC");
        while($row = mysqli_fetch_array($queryDb)){
            echo "'";
            echo $row[0];
            echo "'";
            echo ", ";
        }
    }

    function getData($parameter){
        global $conn;
        $queryDb = mysqli_query($conn, "SELECT $parameter FROM awsdata ORDER BY id ASC");
        while($row = mysqli_fetch_array($queryDb)){
            echo $row[0];
            echo ", ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="600">
    <title>BMKG Cilacap</title>
    <script type="text/javascript" src="Assets/js/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap@5.1.3.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/aws.css">
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
                        <a class="nav-link" href="gempa-bumi.php">Gempa Bumi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="aws-monitoring.php">AWS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        <div class="row d-flex justify-content-between">
            <div class="col-md-6">
                <div class="last-update">
                    <h4>Last Update: <?php echo $result_api["waktu"]; ?> UTC</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="status-aws">
                    <?php statusAws($result_api["temp"]); ?>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md-4">
                <div class="card card-1 shadow">
                    <div class="card-title">
                        <h6>Suhu Udara</h6>
                    </div>
                    <div class="card-content" id="suhu">
                        <h1><?php echo $result_api["temp"]; ?> °C</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-1 shadow">
                    <div class="card-title">
                        <h6>Kelembaban Udara</h6>
                    </div>
                    <div class="card-content">
                        <h1><?php echo $result_api["rh"]; ?> %</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-1 shadow">
                    <div class="card-title">
                        <h6>Radiasi Matahari</h6>
                    </div>
                    <div class="">
                        <canvas id="srChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="col-md-4">
                <div class="card card-1 shadow">
                    <div class="card-title">
                        <h6>Curah Hujan</h6>
                    </div>
                    <div class="">
                        <canvas id="chChart"></canvas>
                    </div>
                </div>
                <div class="card card-1 shadow">
                    <div class="card-title">
                        <h6>Kecepatan Angin</h6>
                    </div>
                    <div class="card-content">
                        <h1><?php echo $result_api["windspeed"]; ?> m/s</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-2 shadow">
                    <div class="card-title">
                        <h6>Pasang Surut</h6>
                    </div>
                    <div class="pasutchart">
                        <canvas id="pasutChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
		var ctx = document.getElementById("srChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [<?php getTime();?> ],
				datasets: [{
					label: 'Radiasi (W/m2)',
					data: [<?php getData("radiasi"); ?>],
                    pointRadius: 0,
					backgroundColor: [
					'rgba(255, 45, 45, 0.2)'
					],
					borderColor: [
					'rgba(255, 45, 45,1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
                    xAxes: [{
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 4
                        },
                        gridLines: {
                            display: false,
                        },
					}],
					yAxes: [{
                        gridLines: {
                            display: false,
                        },
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

    <script>
		var ctx = document.getElementById("pasutChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [<?php getTime() ?>],
				datasets: [{
					label: 'Pasang Surut (m)',
					data: [<?php getData("pasut") ?>],
                    pointRadius: 0,
					backgroundColor: [
					'rgba(0, 221, 233, 0.2)'
					],
					borderColor: [
					'rgba(0, 221, 233, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
                responsive: true, 
                maintainAspectRatio: false,
				scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 4
                        }
					}],
					yAxes: [{
                        gridLines: {
                            display: false,
                        },
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

    <script>
		var ctx = document.getElementById("chChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [<?php getTime() ?>],
				datasets: [{
					label: 'Curah Hujan (mm)',
					data: [<?php getData("curahhujan") ?>],
                    pointRadius: 0,
					backgroundColor: [
					'rgba(0, 238, 103, 0.2)'
					],
					borderColor: [
					'rgba(0, 238, 103, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 4
                        }
					}],
					yAxes: [{
                        gridLines: {
                            display: false,
                        },
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

    <script src="Assets/js/popper.min.js"></script>
    <script src="Assets/js/bootstrap@5.1.3.js"></script>
</body>
</html>