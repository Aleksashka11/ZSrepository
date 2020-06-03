<?php
session_start();
if(isset($_POST["submit"])) {
	$conn = mysqli_connect('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
	$sql = "Select Id_user, Login, Password from User where Login = '" . $_POST["Login"] . "'";
        if(!isset($_COOKIE["member_login"])) {
            $sql .= " AND Password = '" . md5($_POST["Password"]) . "'";
	}
    $result = mysqli_query($conn,$sql);
	$user = mysqli_fetch_array($result);
	if($user) {
			$_SESSION["Id_user"] = $user[0]["Id_user"];
			if(isset($_POST["remember-me"])) {
				setcookie ("member_login",$_POST["Login"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
			}
	} else {
		$message = "Invalid Login";
	}
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="logo.jpg" />
    <!-- Start of  Zendesk Widget script -->
    <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=6b82a1c6-4c62-4347-9db6-b2e1d70af918"> </script>
    <!-- End of  Zendesk Widget script -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Healthy heart  | Login</title>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="317235916990-00nf2fcq67qjeu8b3oengp222jjf4hfh.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>

  <header>
    <?php require 'head.php'; ?>
  </header>

  <body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="sc/login.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="Login" id="username" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="Password" name="Password" id="password" class="form-control" value="">
                            </div>
                            <div class="form-group">
                               
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                
                            </div>
                            <div style="margin-left: 100px; margin-top: -50px;">
                            <script src="//ulogin.ru/js/ulogin.js"></script>
<div id="uLogin" data-ulogin="display=panel;theme=classic;fields=first_name,last_name,email;providers=google;hidden=;redirect_uri=https%3A%2F%2Ftridimensional-laun.000webhostapp.com%2Fgoogle2.php;mobilebuttons=0;"></div>
                            <div style="margin-top: -30px">
                            <a href="RegF.php" style="margin-left: 50px;">Join us</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>

  <footer>
    <?php require 'foot.php'; ?>
  </footer>

</html>
