<?php
	session_start();
?>

<html>
      <head>
            <title>Logout page</title>
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
            <p style="font-size: 20px; text-align: center; padding-top: 30px">You have successfully logged out.<br>Please click <a href="home.php" class="herehover"><u>here</u></a> to visit Home page.</p>
      </body>
</html>