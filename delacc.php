<?php
	session_start();
?>

<!DOCTYPE html>
<?php
	require 'vendor/autoload.php';
	$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$buyercoll = $db->buyer;
	error_reporting(E_ERROR | E_PARSE);
	$acc = $_SESSION['em'];
	$delqry = array("email" => $acc );
	$delres = $buyercoll->deleteOne($delqry);
?>

<html>
      <head>
            <title>Account Deleted page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"> </script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
            <link rel="stylesheet" type="text/css" href="ncprojectcss.css">
			
            
      </head>
      <body>
			<?php
				session_unset();
				session_destroy();
			?>
            <p style="font-size: 20px; text-align: center; padding-top: 30px">Account Deleted Permanently!<br>Please click <a href="home.php" class="herehover"><u>here</u></a> to visit Home page.</p>
      </body>
</html>