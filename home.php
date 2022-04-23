<?php
	session_start();
?>

<!DOCTYPE html>

<html>
      <head>
            <title>Home page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"> </script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
            <link rel="stylesheet" type="text/css" href="ncprojectcss.css">
			
      </head>
      <body>
             <div class="navbar navbar-inverse navbar-fixed-top"> 
                  <div class="container header"> 
                        <div class="navbar-header"> 
                        <h3>Newbie's Companion</h3>
                        </div>
                  </div>
             </div>
          
            <div class="bgimg">
                  <div class="mainpage">
                        <h1 id="mainpageconh">ONE PLACE FOR EVERYTHING</h1> 
                        <hr>
                        <p id="mainpageconp">Looking for accommodation, food facilities and stationery near your work location?<br>This is the right place!</p>
                        <a href="#options"><button type = "button" class="mainpagebutton">Get Started</button></a><br><br><br><br><br><br><br><br><br><br>
                  </div>
            </div>
            
            <div class="secondpg">
            <section id="options">
                  <p>Please select an option to proceed...</p>
                  <div class="row text-center options">
                              <div class="col-md-4 col-sm-6">
                                    <div class="thumbnail">
                                          <a href="admin_access.php"><img src="admin.png" alt="admin"></a>
                                          <div class="caption">
                                                <h3>Admin</h3>
                                          </div>
                                    </div>
                                    <p id="desc">select this if you are here to manage this community</p>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                    <div class="thumbnail">
                                          <a href="buyer_login.php"><img src="user.png" alt="user"></a>
                                          <div class="caption">
                                                <h3>Buyer</h3>
                                          </div>
                                    </div>
                                    <p id="desc">select this if you are looking for facilities</p>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                    <div class="thumbnail">
                                          <a href="seller_login.php"><img src="user.png" alt="user"></a>
                                          <div class="caption">
                                                <h3>Seller</h3>
                                          </div>
                                    </div>
                                    <p id="desc">select this if you are providing the facilities</p>
                              </div>
                        </div>
            </section> <br><br>
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
