<?php
	session_start();
?>
<?php
	require 'vendor/autoload.php';
	$con = new MongoDB\Client;
	$db = $con->ncdb;
	$buyercoll = $db->buyer;
	$facilitiescoll = $db->facilities;
	$mail = $_SESSION['em'];
	if($mail)
	{
		$ans = array("email" => $mail);
		$res = $buyercoll->findOne($ans);
		$username=$res->jsonSerialize()->uname ;
	}
	else
	{
		$username="Login";
	}
?>

<!DOCTYPE html>

<html>
      <head>
            <title>Buyer page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"> </script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
			 <script type="text/javascript" src="../../jqwidgets/jqxcheckbox.js"></script>
			<link href="ncprojectcss.css?<?=filemtime("ncprojectcss.css")?>" rel="stylesheet" type="text/css"/>
			

			<!-- <script type = "text/javascript">  
				function preventBack() { window.history.forward(); }  
				setTimeout("preventBack()", 0);  
				window.onunload = function () { null };  
			</script> -->
			
			<!-- <script type="text/javascript">
				window.history.forward();
				function noBack() {
					window.history.forward();
				}
			</script> -->
            
      </head>
      <body>
             <div class="navbar navbar-inverse navbar-fixed-top"> 
                  <div class="container header"> 
                        <div class="navbar-header"> 
                              <h3 style="margin-top: 5px;">Newbie's Companion
                              <div class="dropdown" style="right:-795px">
                                    <h3 class="glyphicon glyphicon-user"><span style="padding-left: 8px"><?php echo $username; ?></span></h3>
                                    <div class="dropdown-content">
                                           <ul style="list-style-type: none; padding-left: 0">
                                                <li style="padding-bottom: 10px"><p><?php echo $mail; ?></p></li>
                                                <li style="padding-bottom: 12px"><div class="glyphicon glyphicon-cog"><a href="manageaccnew.php" style="padding-left:8px; word-spacing: -0.7em; top: -10px">Manage Account</a></div></li>
                                                <li class="glyphicon glyphicon-log-out"><a href="logout.php" style="padding-left:8px">Logout</a></li>
                                          </ul>
                                    </div>
                              </div>
                              </h3>
                        </div>
                  </div>
             </div>


						<!---->
            <div class="filters">
                  <ul>
				  <form method="post" action="">
                        <li style="list-style-type: none"><h3 style="padding-bottom: 10px">Filters <button class="btn btn-primary" type="submit" style="float:right; font-size:16px">Apply</button></h3></li>
                        <li>Accommodation</li>
                        <ul style="list-style-type: none">
                              <li>
                                    <input type="checkbox" id="hostel" name="hostel" value="hostel"/>
                                    <label for="hostel">&nbsp;Hostel</label><br>
							  </li>
                              <li>
                                    <input type="checkbox" id="pg" name="pg" value="pg"/>
                                    <label for="pg">&nbsp;Paying Guest (PG)</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="flatsrent" name="flatsrent" value="flatsrent">
                                    <label for="flatsrent">&nbsp;Flats on rent</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="flatssale" name="flatssale" value="flatssale">
                                    <label for="flatssale">&nbsp;Flats for sale</label><br>
                              </li>
                        </ul>
                        <li>Food</li>
                        <ul style="list-style-type: none">
                              <li>
                                    <input type="checkbox" id="res" name="res" value="res"/>
                                    <label for="res">&nbsp;Restaurant</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="others" name="others" value="others">
                                    <label for="others">&nbsp;Others (Mess)</label><br>
                              </li>
                        </ul>
                        <li>Stationery</li>
                        <ul style="list-style-type: none">
                              <li>
                                    <input type="checkbox" id="shop" name="shop" value="shop"/>
                                    <label for="shop">&nbsp;Stationery Shop</label><br>
                              </li>
                        </ul>
                        <!--<li>Distance</li>
                        <ul style="list-style-type: none">
                              <li>
                                    <input type="checkbox" id="500m" name="500m" value="500m">
                                    <label for="500m">&nbsp;500 m</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="1km" name="1km" value="1km">
                                    <label for="1km">&nbsp;1 km</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="5km" name="5km" value="5km">
                                    <label for="5km">&nbsp;5 km</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="10km" name="10km" value="10km">
                                    <label for="10km">&nbsp;10 km</label><br>
                              </li>
                        </ul>
                        <li>Price</li>
                        <ul style="list-style-type: none">
                              <li>
                                    <input type="checkbox" id="ltoh" name="ltoh" value="ltoh">
                                    <label for="ltoh">&nbsp;Low to High</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="htol" name="htol" value="htol">
                                    <label for="htol">&nbsp;High to Low</label><br>
                              </li>
                        </ul> -->
						</form>
                  </ul>
            </div>
            
            <h1>Welcome to our Community!!!</h1>
            
            <div class="search-container">
                  <form method="post" action="buyer.php">
                    <input type="text" name="search" placeholder="Location (please enter pincode to search)" minlength="6" maxlength="6"> 
                    <button type="submit" class="glyphicon glyphicon-search"></button>
                  </form>
            </div>
            
			<?php	
				//$fetchqry1 = array();
				//$fetchqry2 = array('projection' => ['name' => 1, '_id' => 0]);
				$cnt = $facilitiescoll->count();
				$fetchres = $facilitiescoll->find();
				$itr = new IteratorIterator($fetchres);
				$itr -> rewind();
				
				$loc=0;
				if(isset($_POST['search']))
				{
					$loc = (int)$_POST['search'];
					if($loc!=0)
					{
						while ($fetchres = $itr->current())
						{
							if(isset($_POST['search']))
							{
								if($loc == $fetchres['pincode'])
								{
									if(isset($_POST['hostel']))
									{
										$fetchres = $facilitiescoll->find(["type" => "Hostel"]);
										echo '<div class="jumbotron">'.$fetchres['type']."<br>".$fetchres['name']."<br>".$fetchres['address']."<br>".$fetchres['pincode']."<br>".$fetchres['contact']."<br>".$fetchres['monetary']."<br>".$fetchres['booking'].'</div>';
									}
									if(isset($_POST['res']))
									{
										$fetchres = $facilitiescoll->find(["type" => "Restaurant"]);
										echo '<div class="jumbotron">'.$fetchres['type']."<br>".$fetchres['name']."<br>".$fetchres['address']."<br>".$fetchres['pincode']."<br>".$fetchres['contact']."<br>".$fetchres['monetary']."<br>".$fetchres['booking'].'</div>';
									}
									if(isset($_POST['shop']))
									{
										$fetchres = $facilitiescoll->find(["type" => "Stationery Shop"]);
										echo '<div class="jumbotron">'.$fetchres['type']."<br>".$fetchres['name']."<br>".$fetchres['address']."<br>".$fetchres['pincode']."<br>".$fetchres['contact']."<br>".$fetchres['monetary']."<br>".$fetchres['booking'].'</div>';
									}
									else
									{
										echo '<div class="jumbotron">'.$fetchres['type']."<br>".$fetchres['name']."<br>".$fetchres['address']."<br>".$fetchres['pincode']."<br>".$fetchres['contact']."<br>".$fetchres['monetary']."<br>".$fetchres['booking'].'</div>';
									}
								}
							}
							$itr->next();
						}
					}
				}
				if($loc==0)
				{
					$flag=0;
					while ($fetchres = $itr->current())
					{
						echo '<div class="jumbotron">'.$fetchres['type']."<br>".$fetchres['name']."<br>".$fetchres['address']."<br>".$fetchres['pincode']."<br>".$fetchres['contact']."<br>".$fetchres['monetary']."<br>".$fetchres['booking'].'</div>';
						$itr->next();
					}	
				}			
			?>
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
