<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap@5.1.3.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/login.css">
</head>

<body class="my-login-page">
		<div class="container">
			<div class="row justify-content-center">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../Assets/img/logo_bmkg.png" alt="bmkg">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="my-login-validation" id="needs-validation" novalidate>
								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
									<div class="invalid-feedback">
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Username or Password is invalid
							    	</div>
								</div>
								<div class="form-group">
									<button type="submit" name="Submit" onclick="myFunction()" class="btn btn-primary btn-block form-control">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>

	<script src="../Assets/js/popper.min.js"></script>
    <script src="../Assets/js/bootstrap@5.1.3.js"></script>
</body>

<?php
if(isset($_POST["Submit"])){
	include "../koneksi.php";
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query=mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");    
    if (mysqli_num_rows($query)==0){
		?>
			<script>
				document.getElementById("needs-validation").classList.add("was-validated");
			</script>
		<?php
    }
    else{
        while($row=mysqli_fetch_array($query)){
            session_start();
            $_SESSION['username']=$row['username'];
			$_SESSION['role']=$row['role'];
            header("location:index.php");
        }
    }
}
?>
</html>