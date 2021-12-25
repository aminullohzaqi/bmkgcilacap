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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Assets/css/upload.css">
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="form-group">
                    <div class="card shadow">
                        <div class="upload-title">
                            <h5 class="text-center">Upload File PDF</h5>
                        </div>
                        <form action="proses.php" method="POST" enctype="multipart/form-data" >
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile" name="fileUpload">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="jenis_file">
                                    <option selected disabled>Jenis File</option>
                                    <option value="11">Pemetaan Hujan Lebat</option>
                                    <option disabled>──────────</option>
                                    <option value="21">Prakiraan Cuaca Kilang Pertamina</option>
                                    <option value="22">Prakiraan Cuaca Area 70</option>
                                    <option value="23">Informasi Petir Kilang Pertamina</option>
                                    <option disabled>──────────</option>
                                    <option value="31">Prakiraan Cuaca Wilayah Pelayanan</option>
                                    <option value="32">Prakiraan Cuaca Laut</option>
                                    <option value="33">Prakiraan Cuaca Pelabuhan</option>
                                    <option disabled>──────────</option>
                                    <option value="41">Peringatan Dini Cuaca</option>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>