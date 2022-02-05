<?php
    session_start();
    include 'koneksi.php';

    if(!$_SESSION["role"]){
        header('Location: login.php');
    }
    
    $data_api = file_get_contents('http://202.90.199.132/aws-new/data/station/latest/5000000060');
    $result_api = json_decode($data_api, true);

    $wind_direction = $result_api["winddir"];
    $wind_direction = number_format($wind_direction, 0);

    $percent_temp = ((number_format($result_api["temp"],0) - 20)/(35 - 20)) * 100;
    $percent_temp = number_format($percent_temp, 0);

    $percent_rh = ((number_format($result_api["rh"],0) - 40)/(100 - 40)) * 100;
    $percent_rh = number_format($percent_rh, 0);

    $percent_ws = ((number_format($result_api["windspeed"],0) - 0)/(8 - 0)) * 100;
    $percent_ws = number_format($percent_ws, 0);


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
    <meta name="Description" content="Informasi Data Automatic Weather Station (AWS) Cilacap">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="600">
    <title>BMKG Cilacap</title>
    <link rel="icon" type="image/x-icon" href="Assets/img/logo_bmkg.png" />
    <script type="text/javascript" src="Assets/js/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap@5.1.3.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/aws.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/gauge.css">
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
                    <div class="card-gauge" id="suhu">
                        <div class="GaugeMeter" data-percent="<?php echo $percent_temp; ?>" data-text="<font style='color:#424242;font-size:1em;letter-spacing:-1px'><?php echo $result_api["temp"]; ?></font>" data-size="200" data-theme="DarkRed-LightRed" data-back="RGBa(0,0,0,.1)" data-animate_gauge_colors="1" data-animate_text_colors="1" data-width="15" data-label="°C" data-style="Arch" data-label_color="#424242"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-1 shadow">
                    <div class="card-title">
                        <h6>Kelembaban Udara</h6>
                    </div>
                    <div class="card-gauge">
                        <div class="GaugeMeter" data-percent="<?php echo $percent_rh; ?>" data-text="<font style='color:#424242;font-size:1em;letter-spacing:-1px'><?php echo $result_api["rh"]; ?></font>" data-size="200" data-theme="DarkBlue-LightBlue" data-back="RGBa(0,0,0,.1)" data-animate_gauge_colors="1" data-animate_text_colors="1" data-width="15" data-label="%" data-style="Arch" data-label_color="#424242"></div>
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
                    <div class="card-gauge">
                        <div class="GaugeMeter" data-percent="<?php echo $percent_ws; ?>" data-text="<font style='color:#424242;font-size:1em;letter-spacing:-1px'><?php echo $result_api["windspeed"]; ?></font>" data-size="200" data-theme="DarkGreen-LightGreen" data-back="RGBa(0,0,0,.1)" data-animate_gauge_colors="1" data-animate_text_colors="1" data-width="15" data-label="m/s (<?php echo $wind_direction ?>°)" data-style="Arch" data-label_color="#424242"></div>
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

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script> 
    <script src="Assets/js/GaugeMeter.js"></script> 
    <script>
        $(".GaugeMeter").gaugeMeter();
    </script>

    <script src="Assets/js/popper.min.js"></script>
    <script src="Assets/js/bootstrap@5.1.3.js"></script>
</body>
</html>