<?php

include '../koneksi.php';

function getFileName($file){
    global $conn;
    $namaFile = mysqli_query($conn, "SELECT namafile FROM bmkgfiles WHERE id='$file'");
    $resultNamaFile = mysqli_fetch_array($namaFile);

    return $resultNamaFile[0];
}

function uploadToDb($file, $name, $date){
    global $conn;
    mysqli_query($conn, "UPDATE bmkgfiles SET namafile='$name', dateinput='$date' WHERE id='$file'");
}

function getName($no){
    global $conn;
    if ($no == 2){
        $query = mysqli_query($conn, "SELECT namafile FROM bmkgfiles WHERE id=23");
    } elseif($no == 3){
        $query = mysqli_query($conn, "SELECT namafile FROM bmkgfiles WHERE id=24");
    } elseif($no == 4){
        $query = mysqli_query($conn, "SELECT namafile FROM bmkgfiles WHERE id=25");
    }

    $resultQuery = mysqli_fetch_array($query);

    return $resultQuery[0];
}

function getDateInput($noDate){
    global $conn;
    if ($noDate == 2){
        $query = mysqli_query($conn, "SELECT dateinput FROM bmkgfiles WHERE id=23");
    } elseif($noDate == 3){
        $query = mysqli_query($conn, "SELECT dateinput FROM bmkgfiles WHERE id=24");
    } elseif($noDate == 4){
        $query = mysqli_query($conn, "SELECT dateinput FROM bmkgfiles WHERE id=25");
    }

    $resultQuery = mysqli_fetch_array($query);

    return $resultQuery[0];
}

if (isset($_POST['Submit'])) { 
    $fileType = $_POST['jenis_file'];
    $dateInput = date('Ymd');
    
    $filename = $_FILES['fileUpload']['name'];

    $destination = '../Files/' . $filename;

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['fileUpload']['tmp_name'];

    if (!in_array($extension, ['pdf', 'jpg', 'jpeg', 'png'])) {
        echo "<script type='text/javascript'>alert('File type is not supported'); window.location.href='index.php';</script>";
    }  else {

        if($fileType == "23"){
            unlink("../Files/" . getFileName(25));  
            if (move_uploaded_file($file, $destination)) {
                uploadToDb(25, getName(3), getDateInput(3));
                uploadToDb(24, getName(2), getDateInput(2));
                uploadToDb($fileType, $filename, $dateInput);
                echo "<script type='text/javascript'>alert('File Uploaded Successfully'); window.location.href='index.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('File Upload Failed'); window.location.href='index.php';</script>";
            }
        } else{
            unlink("../Files/" . getFileName($fileType));
            if (move_uploaded_file($file, $destination)) {
                uploadToDb($fileType, $filename, $dateInput);
                echo "<script type='text/javascript'>alert('File Uploaded Successfully'); window.location.href='index.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('File Upload Failed'); window.location.href='index.php';</script>";
            }
        }
    }
}