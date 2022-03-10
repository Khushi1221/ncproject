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
		$user=$res->jsonSerialize()->uname ;
	}
	else
	{
		$user="User";
	}
?>

<!DOCTYPE html>

<html>
      <head>
            <title>Edit Details page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"> </script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
			<link rel="stylesheet" type="text/css" href="ncprojectcss.css">
			
			
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
                              <h3 style="margin-top: 15px;">Newbie's Companion</h3>
                        </div>
                  </div>
             </div>
			 
			 <div style="margin-top:50px">
				<h1 style="font-size:42px">Edit Details</h1>
				<p style="font-size:30px; margin-left:70px">Hello <?php echo $user; ?></p>
				<p style="font-size:20px; margin-left:70px">Your products:</p>
				<?php
					$fetchres = $facilitiescoll->find(['owneremail' => $mail]);
					if($mail)
					{
						foreach($fetchres as $alldocs)
						{
							if(strcmp($alldocs['facility'], "Accommodation") == 0)
							{
								echo '<div class="jumbotron" style="margin-left:70px">'.'<a href="editform.php"><button type="button" class="btn btn-light" style="float:right; width:80px; font-size:22px; color:black; margin-right:15px; padding:5px 0 5px 0">Edit</button></a>'.'<p style="font-size:20px">id : '.$alldocs['id']."<br>".'<p style="font-size:20px">Type : '.$alldocs['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$alldocs['name']."<br>".'<p style="font-size:20px">Address : '.$alldocs['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$alldocs['city']."<br>".'<p style="font-size:20px">Pincode : '.$alldocs['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$alldocs['state']."<br>".'<p style="font-size:20px">Phone Number : '.$alldocs['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Number of rooms/flats available : '.$alldocs['availability']."<br>".'<p style="font-size:20px">Monetary Details : '.$alldocs['monetary details']."<br>".'<p style="font-size:20px; line-height:5px">Booking : '.$alldocs['booking']."<br>".'<p style="font-size:20px">Booking Link : '.$alldocs['booking link']."<br>".'<p style="font-size:20px; line-height:5px; margin-bottom:2px">Other Information : '.$alldocs['other info'].'</div>';
							}
							else
							{
								echo '<div class="jumbotron" style="margin-left:70px">'.'<a href="editform.php"><button type="button" class="btn btn-light" style="float:right; width:80px; font-size:22px; color:black; margin-right:15px; padding:5px 0 5px 0">Edit</button></a>'.'<p style="font-size:20px">id : '.$alldocs['id']."<br>".'<p style="font-size:20px">Type : '.$alldocs['type']."<br>".'<p style="font-size:20px; line-height:5px">Name : '.$alldocs['name']."<br>".'<p style="font-size:20px">Address : '.$alldocs['address']."<br>".'<p style="font-size:20px; line-height:5px">City : '.$alldocs['city']."<br>".'<p style="font-size:20px">Pincode : '.$alldocs['pincode']."<br>".'<p style="font-size:20px; line-height:5px">State : '.$alldocs['state']."<br>".'<p style="font-size:20px">Phone Number : '.$alldocs['phone number']."<br>".'<p style="font-size:20px; line-height:5px">Monetary Details : '.$alldocs['monetary details']."<br>".'<p style="font-size:20px">Booking : '.$alldocs['booking']."<br>".'<p style="font-size:20px; line-height:5px">Booking Link : '.$alldocs['booking link']."<br>".'<p style="font-size:20px; margin-bottom:2px">Other Information : '.$alldocs['other info'].'</div>';
							}
						}
					}
					else
					{
						echo '<p style="font-size:18px; margin-left:72px">'."No Results Found.".'</p>';
					}
				?>
			 </div>	<br><br>
			
             <footer>	  
					  <div style="float:left; padding-left:50px; padding-top:10px; margin-left:255px">
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
