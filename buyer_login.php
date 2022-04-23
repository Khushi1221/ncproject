<?php
	session_start();
?>

<!DOCTYPE html>

<html>
      <head>
            <title>Buyer Login page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"> </script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
            <link rel="stylesheet" type="text/css" href="ncprojectcss.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
			
      </head>
      <body>
            <div class="navbar navbar-inverse navbar-fixed-top"> 
                  <div class="container header"> 
                        <div class="navbar-header"> 
                        <h3>Newbie's Companion</h3>
                        </div>
                  </div>
             </div>
            
            <div class="container login_form">
                  <div class="row">
                        <div class="col-xs-6 col-xs-offset-3">
                              <div class="panel panel-primary">
                                    <div class="panel-heading">
                                          <h2>LOGIN</h2>
                                    </div>
                                    <div class="panel-body">
                                          <p class="text-warning" style="font-size: 18px">Please login to proceed...</p>
                                          <form method = "post" action = "buyer_login_script.php">
                                           <div class="form-group">
                                                 <input type="text" class="form-control input-lg" name="email" placeholder="Email" required><br>
                                                 <input type="password" class="form-control input-lg" name="password" minlength="8" placeholder="Password (minimum 8 characters)" required id="password1"><br>
                                                 <i class="bi bi-eye-slash" id="togglePassword1"></i>
                                                      <script type="text/javascript">
                                                      const togglePassword1 = document.querySelector('#togglePassword1');
                                                      const password1 = document.querySelector('#password1');	
                                                      togglePassword1.addEventListener('click', function (e) {
                                                          // toggle the type attribute
                                                          const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
                                                          password1.setAttribute('type', type);
                                                          // toggle the eye / eye slash icon
                                                          this.classList.toggle('bi-eye');
                                                      });
                                                      </script>			
													  <p style="margin-top:-10px; margin-left:5px"><a href="buyerresetpwd.php">Forgot Password? Reset it.</a><p><br>
                                                      <input type="submit" value="Login" class="btn btn-primary" style="font-size: 18px"><br>
                                           </div>
                                          </form>
                                    </div>
                                    <div class="panel-footer" style="margin:10px 0 0 0">
                                          <p style="margin:3px 0 0 0; font-size: 16px">Don't have an account? <a href="buyer_signup.php">Register</a></p>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
            
            <footer>	  
					  <div style="float:left; padding-left:50px; padding-top:10px; margin-left:240px">
						<p style="font-size:22px">About Us</p>
						<div style="width:300px">
							<p style="text-align:justify; font-size:16px">Newbie's Companion is a website that makes settlement easy for a new comer in a particular city.<br>It helps the users
							   in finding accommodation, food and stationery thus saving their time and energy.</p>
						</div>
					  </div>
					  <div style="float:left; padding-left:50px; padding-top:10px;">
						<p style="font-size:22px">Locations We Serve</p>
						<div style="width:auto">
							<p style="font-size:16px">Pune, Maharashtra, India</p>
						</div>
					  </div>
					  <div style="float:left; padding-left:50px; padding-top:10px;">
						<p style="font-size:22px">Contact Us</p>
						<div style="width:auto">
							<p style="font-size:16px">+91 9876543210<br>newbiescompanion@gmail.com<br>Some Address</p>
						</div>
					  </div>
					  <br><br><br><br><br><br><br><br><br>
                                    
                      <center>
                            <p style="padding-top: 35px; padding-bottom: 20px">© Copyright 2022 Newbie's Companion. All Rights Reserved.</p>
                      </center>
          </footer>
      </body>
</html>
