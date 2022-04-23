<?php
	session_start();
?>

<!DOCTYPE html>

<html>
      <head>
            <title>Manage Account page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"> </script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
			<link href="ncprojectcss.css?<?=filemtime("ncprojectcss.css")?>" rel="stylesheet" type="text/css"/>
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
			

			<script type="text/javascript">
				window.history.forward();
				function noBack() {
					window.history.forward();
				}
			</script>
            
      </head>
	  <body>
             <div class="navbar navbar-inverse navbar-fixed-top"> 
                  <div class="container header"> 
                        <div class="navbar-header"> 
                              <h3 style="margin-top: 15px; margin-bottom: 15px">Newbie's Companion</h3>
                        </div>
                  </div>
             </div>
			 
			 <div class="sidenav">
			  <a href="#" id="CPWDO" onclick="changePwd()">Change Password</a>
			  <a href="#" id="CUNO" onclick="changeUname()">Change Username</a>
			  <a href="logout.php">Logout</a>
			  <a href="#" id="DAC" onclick="deleteAccount()">Delete Account</a>
			</div>

			<div class="main">
			<a href="buyer.php" style="margin-left:-50px">Go Back</a>
			<!-- CHANGE PASSWORD -->
			<div class="container" id="CPWD" style="margin-bottom: 111px">
				<h2>Change Password</h2>
				<div class="col-xs-6 col-xs-offset-3" style="margin-left: -15px; padding-top: 10px">
                    <form method = "post" action = "manageacc_script_pwd.php">
                    <div class="form-group">
						<input type="password" class="form-control input-lg" minlength="8"  name="oldpassword" placeholder="Old Password (minimum 8 characters)" required id="password1"><br>
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
						<p style="margin-top:-10px; margin-left:5px"><a href="buyerresetpwd.php">Forgot Password? Reset it.</a><p>

						<input type="password" class="form-control input-lg" minlength="8"  name="newpassword" placeholder="New Password (minimum 8 characters)" required id="password2"><br>
						<i class="bi bi-eye-slash" id="togglePassword2"></i>
						<script type="text/javascript">
						const togglePassword2 = document.querySelector('#togglePassword2');
						const password2 = document.querySelector('#password2');	
						togglePassword2.addEventListener('click', function (e) {
							// toggle the type attribute
							const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
							password2.setAttribute('type', type);
							// toggle the eye / eye slash icon
							this.classList.toggle('bi-eye');
						});
						</script>

						<input type="password" class="form-control input-lg" minlength="8"  name="retypepassword" placeholder="Re-type New Password" required id="password3"><br>
						<i class="bi bi-eye-slash" id="togglePassword3"></i>
						<script type="text/javascript">
						const togglePassword3 = document.querySelector('#togglePassword3');
						const password3 = document.querySelector('#password3');	
						togglePassword3.addEventListener('click', function (e) {
							// toggle the type attribute
							const type = password3.getAttribute('type') === 'password' ? 'text' : 'password';
							password3.setAttribute('type', type);
							// toggle the eye / eye slash icon
							this.classList.toggle('bi-eye');
						});
						</script>
						
						<button type="submit" class="btn btn-primary" style="font-size: 18px" onclick="remCPWD();">Change</button>
					</form>
                    </div>
				</div>
			</div>	
			
				
			<!-- CHANGE USERNAME -->
			<div class="container" id="CUN" style="display:none; margin-bottom: 137px">
				<h2>Change Username</h2>
				<div class="col-xs-6 col-xs-offset-3" style="margin-left: -15px; padding-top: 10px">
                    <form method = "post" action = "manageacc_script_uname.php">
                    <div class="form-group">
						<input type="text" class="form-control input-lg" id="oldusername" name="oldusername" placeholder="Old Username"><br>
						<input type="text" class="form-control input-lg" id="newusername" name="newusername" placeholder="New Username"><br>
						<button type="submit" class="btn btn-primary" style="font-size: 18px" onclick="remCPN();">Change</button><br><br><br>
                    </div>
                    </form>
                </div>
			</div>
				
			</div>
					
<script>
var flag=1;
function deleteAccount() 
   {
	   var r = confirm("Are you sure you want to Delete Account?");
		var txt;
		if (r == true)
		{
			window.location.replace("http://localhost:8081/test/delacc.php");
			txt = "Account Deleted Permanently!";
		}
		document.getElementById("display1").style.display = '';
		document.getElementById("display").innerHTML = txt;
		flag=3;
  }
													  
function changeUname()
{
	if(flag!=0)
	{
		remele();
	}
	document.getElementById("CUNO").style.color = "white";
	document.getElementById("CUN").style.display = '';
	flag=2;
}
function remCUN()
{
	document.getElementById("CUN").style.display = "none";
	document.getElementById("CUNO").style.color = "#818181";
}
function changePwd()
{
	if(flag!=0)
	{
		remele();
	}
	document.getElementById("CPWDO").style.color = "white";
	document.getElementById("CPWD").style.display = '';
	flag=1;
}
function remCPWD()
{
	var elem=document.getElementById("CPWD").style.display = "none";
	document.getElementById("CPWDO").style.color = "#818181";
}
function remdel()
{
	document.getElementById("display").style.display = "none";
	document.getElementById("display1").style.display = "none";
	document.getElementById("DAC").style.color = "#818181";
}
function remele()
{
	if(flag==1)
	{
		remCPWD();
	}
	else if(flag==2)
	{
		remCUN();
	}
	else if (flag==3)
	{
		remdel();
	}
	flag=0;
}
</script>					
			
			<footer>	  
					  <div style="float:left; padding-left:50px; padding-top:10px; margin-left:335px">
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