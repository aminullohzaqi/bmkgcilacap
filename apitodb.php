<?php
    include 'koneksi.php';

    $data_api = file_get_contents('http://202.90.199.132/aws-new/data/station/latest/5000000060');
    $result_api = json_decode($data_api, true);

    $data_api_water = file_get_contents('http://202.90.199.132/aws-new/data/station/latest/3000000017');
    $result_api_water = json_decode($data_api_water, true);

    $datetime = $result_api["waktu"];
    $datetime_split = explode(" ", $datetime);

    $date = $datetime_split[0];
    $time = $datetime_split[1];
    $ch = number_format($result_api["rain"], 1) ;
    $sr = floatval($result_api["solrad"]);
    $wl = number_format($result_api_water["waterlevel"],1);

    mysqli_query($conn, "INSERT INTO awsdata(curahhujan, radiasi, pasut, date, time) VALUES('$ch', '$sr', '$wl', '$date', '$time')");

    $imgCitra = file_get_contents("http://202.90.198.22/IMAGE/ANIMASI/H08_EH_Jateng_m18.gif");
    file_put_contents("Files/citra.gif", $imgCitra);
?>