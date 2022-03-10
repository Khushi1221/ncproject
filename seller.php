<?php
	session_start();
	require 'vendor/autoload.php';
	$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$sellercoll = $db->seller;
	$facilitiescoll = $db->facilities;
	$mail = $_SESSION['em'];
	if($mail)
	{
		$ans = array("email" => $mail);
		$res = $sellercoll->findOne($ans);
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
            <title>Seller page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"> </script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
			<link href="ncprojectcss.css?<?=filemtime("ncprojectcss.css")?>" rel="stylesheet" type="text/css"/>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
			

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
			<script>
			if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
			</script>
            
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
                                                <li style="padding-bottom: 12px"><div class="glyphicon glyphicon-cog"><a href="manageaccnewseller.php" style="padding-left:8px; word-spacing: -0.7em; top: -10px">Manage Account</a></div></li>
                                                <li class="glyphicon glyphicon-log-out"><a href="logout.php" style="padding-left:8px">Logout</a></li>
                                          </ul>
                                    </div>
                              </div>
                              </h3>
                        </div>
                  </div>
             </div>
			 
			 <div class="sidenav" style="height:100%; width:270px">
			  <a href="provide_details_seller.php" style="padding-left:65px; margin-top:20px">Provide Details</a>
			  <a href="edit_details_seller.php" style="padding-left:65px">Edit Details</a>
			</div>

<form method="POST" action="seller.php">
            <div class="filters" style="margin-right:40px">
                  <ul>
                        <li style="list-style-type: none"><h3 style="padding-bottom: 10px">Filters </h3></li>
                        <li>Accommodation</li>
                        <ul style="list-style-type: none">
                              <li>
                                    <input type="checkbox" id="hostel" name="hostel" value="hostel"<?=(isset($_POST['hostel'])?' checked':'')?>/>
                                    <label for="hostel">&nbsp;Hostel</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="pg" name="pg" value="pg"<?=(isset($_POST['pg'])?' checked':'')?>/>
                                    <label for="pg">&nbsp;Paying Guest (PG)</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="flatsrent" name="flatsrent" value="flatsrent"<?=(isset($_POST['flatsrent'])?' checked':'')?>/>
                                    <label for="flatsrent">&nbsp;Flats on rent</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="flatssale" name="flatssale" value="flatssale"<?=(isset($_POST['flatssale'])?' checked':'')?>/>
                                    <label for="flatssale">&nbsp;Flats for sale</label><br>
                              </li>
                        </ul>
                        <li>Food</li>
                        <ul style="list-style-type: none">
                              <li>
                                    <input type="checkbox" id="res" name="res" value="res"<?=(isset($_POST['res'])?' checked':'')?>/>
                                    <label for="res">&nbsp;Restaurant</label><br>
                              </li>
                              <li>
                                    <input type="checkbox" id="others" name="others" value="others"<?=(isset($_POST['others'])?' checked':'')?>/>
                                    <label for="others">&nbsp;Others (Mess)</label><br>
                              </li>
                        </ul>
                        <li>Stationery</li>
                        <ul style="list-style-type: none">
                              <li>
                                    <input type="checkbox" id="shop" name="shop" value="shop"<?=(isset($_POST['shop'])?' checked':'')?>/>
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
                  </ul>
            </div>
            
            <h1 style="padding-top:52px; margin-left:290px">Welcome to our Community!!!</h1>
            
            
                 
				 <div class="search-container" style="margin-left:225px">
                    <input type="text" name="search" placeholder="Location (please enter pincode to search)" minlength="6" maxlength="6"> 
                    <button type="submit" class="glyphicon glyphicon-search"></button>
					</div>
                  </form>
            			
		   
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
					$flag=0;
					$loc = (int)$_POST['search'];
					if($loc!=0)
					{
						echo '<div style="margin-left:300px; font-size:16px">'."Showing results for pincode : ".$loc.'</div>';
						while ($fetchres = $itr->current())
						{
								if($loc == $fetchres['pincode'])
								{
									if(isset($_POST['hostel']) && $fetchres['type']=="Hostel")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$fetchres['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['pg']) && $fetchres['type']=="PG (Paying Guest)")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$fetchres['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['flatsrent']) && $fetchres['type']=="Flats on Rent")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$fetchres['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['flatssale']) && $fetchres['type']=="Flats for Sale")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$fetchres['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['res']) && $fetchres['type']=="Restaurant")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px; line-height:5px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['others']) && $fetchres['type']=="Others (Mess, etc.)")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px; line-height:5px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['shop']) && $fetchres['type']=="Stationery Shop")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px; line-height:5px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(!(isset($_POST['hostel'])||isset($_POST['pg'])||isset($_POST['flatsrent'])||isset($_POST['flatssale'])||isset($_POST['res'])||isset($_POST['others'])||isset($_POST['shop'])))
									{
										if(strcmp($fetchres['facility'], "Accommodation") == 0)
										{
											echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$fetchres['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
										}
										else
										{
											echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px; line-height:5px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
										}
									}
								}
							$itr->next();
						}
					}
				}						
				if($loc==0)
				{
					//echo '<div style="margin-left:80px; font-size:16px">'."No results for pincode : ".$loc.'</div>';
					$flag1=0;
					while ($fetchres = $itr->current())
					{
									if(isset($_POST['hostel']) && $fetchres['type']=="Hostel")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$fetchres['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['pg']) && $fetchres['type']=="PG (Paying Guest)")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$fetchres['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['flatsrent']) && $fetchres['type']=="Flats on Rent")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$fetchres['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['flatssale']) && $fetchres['type']=="Flats for Sale")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$fetchres['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['res']) && $fetchres['type']=="Restaurant")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px; line-height:5px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(isset($_POST['others']) && $fetchres['type']=="Others (Mess, etc.)")
									{
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px; line-height:5px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';		
									}
									if(isset($_POST['shop']) && $fetchres['type']=="Stationery Shop")
									{										
										echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px; line-height:5px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
									}
									if(!(isset($_POST['hostel'])||isset($_POST['pg'])||isset($_POST['flatsrent'])||isset($_POST['flatssale'])||isset($_POST['res'])||isset($_POST['others'])||isset($_POST['shop'])))
									{
										if(strcmp($fetchres['facility'], "Accommodation") == 0)
										{
											echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$fetchres['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
										}
										else
										{
											echo '<div class="jumbotron" style="margin-left:300px; margin-right:315px">'.'<button type="button" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-flag" style="float:right; font-size:28px; color:black; margin-right:18px; padding:5px 5px 5px 5px"></button>'.'<p style="font-size:20px">id : '.$fetchres['id']."<br>".'<p style="font-size:20px">Type : '.$fetchres['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$fetchres['name']."<br>".'<p style="font-size:20px">Address : '.$fetchres['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$fetchres['city']."<br>".'<p style="font-size:20px">Pincode : '.$fetchres['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$fetchres['state']."<br>".'<p style="font-size:20px">Phone Number : '.$fetchres['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Monetary Details : '.$fetchres['monetary details']."<br>".'<p style="font-size:20px">Booking : '.$fetchres['booking']."<br>".'<p style="font-size:20px; line-height:5px">Booking Link : '.$fetchres['booking link']."<br>".'<p style="font-size:20px; margin-bottom:2px">Other Information : '.$fetchres['other info'].'</div>';
										}
									}
									$itr->next();
					}	
				}
?>

<!-- Modal to Report as Fake -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Report as Fake</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="seller.php">
			<p style="font-size:16px">Please enter id to Report as Fake</p>
			<input type="text" class="form-control" style="width:100px" name="id" placeholder="id" required>
			<input type="submit" value="Report" class="btn btn-danger" style="margin:15px 0 0 0; font-size:16px">
		  </form>
        </div>
      </div>
    </div>
  </div>
  
  <?php
    $con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$facilitiescoll = $db->facilities;
	$reportedcoll = $db->reported;
	$doccnt = $reportedcoll->count();
	if($doccnt == 0)
	{
		$idcnt = 1;
	}
	else
	{
		$idcnt = $doccnt + 1;
	}
	$pid=0;
	if(isset($_POST['id']))
	$pid = (int)$_POST['id'];
	$pname = $facilitiescoll->findOne(["id" => $pid]);
	$checkpid = $facilitiescoll->findOne(["id" => $pid]);
	if(isset($_POST['id']))
	{
		if($checkpid)
		{
			date_default_timezone_set("Asia/Kolkata");
			$timestamp = date("d/m/Y-H:i:s");
			$reportedcoll->insertOne(["id" => $idcnt, "uname" => $username, "pid" => $pid, "pname" => $pname['name'], "timestamp" => $timestamp]);
			}
		else
		{
			echo '<script>alert("Product with id = '.$pid.' Not Found!")</script>';
		}
	}
  ?>
			<br><br><br><br><br><br><br><br><br><br><br><br>
           <footer>	  
					  <div style="float:left; padding-left:50px; padding-top:10px; margin-left:250px">
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
					  <div style="float:left; padding-left:50px; padding-top:10px">
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
