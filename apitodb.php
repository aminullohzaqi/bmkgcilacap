<?php
    include 'koneksi.php';

    $data_api = file_get_contents('http://202.90.199.132/aws-new/data/station/latest/3000000017');
    $result_api = json_decode($data_api, true);

    $datetime = $result_api["waktu"];
    $datetime_split = explode(" ", $datetime);

    $date = $datetime_split[0];
    $time = $datetime_split[1];
    $ch = number_format($result_api["rain"], 1) ;
    $sr = floatval($result_api["solrad"]);
    $wl = number_format($result_api["waterlevel"],1);

    mysqli_query($conn, "INSERT INTO awsdata(curahhujan, radiasi, pasut, date, time) VALUES('$ch', '$sr', '$wl', '$date', '$time')");
?>