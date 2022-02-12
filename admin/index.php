<?php
    session_start();

    if($_SESSION["role"] != "admin"){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Site</title>
    <link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap@5.1.3.css">
    <link rel="stylesheet" type="text/css" href="../Assets/css/upload.css">
</head>
<body>
    <div class="container content">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="form-group">
                    <div class="card shadow">
                        <div class="upload-title">
                            <h5 class="text-center">Upload File PDF / JPG</h5>
                        </div>
                        <form action="proses.php" method="POST" enctype="multipart/form-data" >
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile" name="fileUpload">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="jenis_file">
                                    <option selected disabled>Jenis File</option>
                                    <option value="21">Prakiraan Cuaca Kilang Pertamina</option>
                                    <option value="22">Prakiraan Cuaca Area 70</option>
                                    <option value="23">Informasi Petir Kilang Pertamina</option>
                                    <option disabled>──────────</option>
                                    <option value="31">Prakiraan Cuaca Wilayah Pelayanan</option>
                                    <option value="32">Prakiraan Cuaca Laut</option>
                                    <option value="33">Prakiraan Cuaca Pelabuhan</option>
                                    <option value="34">Pasang Surut</option>
                                    <option disabled>──────────</option>
                                    <option value="41">Prakiraan Hujan Lebat</option>
                                    <option value="42">Peringatan Dini Gelombang</option>
                                    <option disabled>──────────</option>
                                    <option value="51">Informasi Gempa Bumi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="Submit" class="btn btn-primary form-control">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="Assets/js/popper.min.js"></script>
    <script src="Assets/js/bootstrap@5.1.3.js"></script>
</body>
</html>