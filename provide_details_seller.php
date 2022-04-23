<?php
	session_start();
	require 'vendor/autoload.php';
	$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$sellercoll = $db->seller;
	$facilitiescoll = $db->facilities;
	$mail = $_SESSION['em'];
	$doccnt = $facilitiescoll->count();
	if($doccnt == 0)
	{
		$idcnt = 1;
	}
	else
	{
		$idcnt = $doccnt + 1;
	}
?>

<!DOCTYPE html>

<html>
      <head>
            <title>Provide Details page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"> </script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
			<link rel="stylesheet" type="text/css" href="ncprojectcss.css">
			
			
			<script>
					function show1()
					{
					  document.getElementById('disp').style.display ='block';
					  document.getElementById('disp').setAttribute("required", "");
					}
					function show2()
					{
					  document.getElementById('disp').style.display = 'none';
					  document.getElementById('disp').removeAttribute('required');
					}
					function showav()
					{
						if(document.getElementById('fac').value == 'Accommodation')
						{
							document.getElementById('dispav').style.display ='block';
							document.getElementById('dispav').setAttribute("required", "");
						}
						else
						{
							document.getElementById('dispav').style.display = 'none';
							document.getElementById('dispav').removeAttribute('required');
						}
					}
			</script>
            
      </head>
      <body>
             <div class="navbar navbar-inverse navbar-fixed-top"> 
                  <div class="container header"> 
                        <div class="navbar-header"> 
                              <h3 style="margin-top: 15px;">Newbie's Companion</h3>
                        </div>
                  </div>
             </div>
			 
			 <div class="container">

			 <div class="row">
			 <div class="col-md-6">
			 <h4 style = "margin-top:65px; margin-left:-55px"> <a href="seller.php" >Go Back</a></h4>
             <h2 style="margin-top:5px; font-size:42px; font-family:Times New Roman">Provide Details</h2><br>
             <form method = "post">
				 <label for="fac" style="font-size:18px">Select Facility</label>
				  <select onchange="showav()" name="fac" id="fac" style="width:200px; height:30px; font-size:16px; margin-left:100px" required>
					<option value="">---select one---</option>
					<option>Accommodation</option>
					<option>Food</option>
					<option>Stationery Shop</option>
				  </select> <br><br>
				 <label for="type" style="font-size:18px">Select Type</label>
				  <select name="type" id="type" style="width:202px; height:30px; font-size:16px; margin-left:120px" required>
					<option value="">---select one---</option>
					<option>Hostel</option>
					<option>PG (Paying Guest)</option>
					<option>Flats on Rent</option>
					<option>Flats for Sale</option>
					<option>Restaurant</option>
					<option>Others (Mess, etc.)</option>
					<option>Stationery Shop</option>
				  </select> <br><br>
				 <label for="name" style="font-size:18px">Name</label>
				 <input type="text" id="name" name="name" style="width:300px; height:30px; font-size:16px; margin-left:168px" required> <br><br>
				 <label for="address" style="font-size:18px">Address</label>
				 <textarea id="address" name="address" style="font-size:16px; margin-left:145px; width:300px; height:60px" required></textarea> <br><br>
				 <label for="city" style="font-size:18px">City</label>
				 <input type="text" id="city" name="city" style="width:300px; height:30px; font-size:16px; margin-left:182px" required> <br><br>
				 <label for="pincode" style="font-size:18px">Pincode</label>
				 <input type="text" id="pincode" name="pincode" minlength=6 maxlength=6 style="width:300px; height:30px; font-size:16px; margin-left:145px" required> <br><br>
				 <label for="state" style="font-size:18px">State</label>
				 <input type="text" id="state" name="state" style="width:300px; height:30px; font-size:16px; margin-left:170px" required> <br><br>
				 <label for="phone" style="font-size:18px">Phone Number</label>
				 <input type="tel" pattern="[0-9]{10}" id="phone" name="phone" style="width:300px; height:30px; font-size:16px; margin-left:85px" required> <br>
				 <p style="font-size:14px">Format: 1234567890</p> <br>
				 </div>
				 <div class="col-md-6" style="padding-top:137px">
				 <div id="dispav" style="display:none">
					<label for="av" style="font-size:18px">Number of rooms/flats available<br></label>
					<input type="text" id="av" name="av" style="width:500px; height:30px; font-size:16px; margin-left:0px"> <br><br>
				 </div>
				 <label for="monetary" style="font-size:18px">Monetary Details (rate, price, etc.)<br><p style="font-size:14px; font-weight:normal">Please write "NA" (without double quotes) if not applicable.</p></label>
				 <input type="text" id="monetary" name="monetary" style="width:500px; height:30px; font-size:16px; margin-left:0px" required> <br><br>
				 <label for="booking" style="font-size:18px">Booking Details</label>
				 <input type="radio" id="online" name="oo" value="online" onclick="show1()" style="margin-left:70px" required>
  				 <label for="online" style="font-weight:normal; font-size:16px">Online</label>
				 <input type="radio" id="offline" name="oo" value="offline" onclick="show2()" style="margin-left:45px" required>
  				 <label for="offline" style="font-weight:normal; font-size:16px">Offline</label>
				 <input type="radio" id="NA" name="oo" value="NA" onclick="show2()" style="margin-left:45px" required>
  				 <label for="NA" style="font-weight:normal; font-size:16px">NA</label> <br>
				 <div id="disp" style="display:none">
					 <label for="link" style="font-size:18px">Please provide the link for online booking</label><br>
					 <input type="text" id="link" name="link" style="width:500px; height:30px; font-size:16px"> <br><br>
				 </div>
				 <br><label for="otherinfo" style="font-size:18px">Other Details/Information<br><p style="font-size:14px; font-weight:normal">Please write "NA" (without double quotes) if you don't want to fill this field.</p></label><br>
				 <textarea id="otherinfo" name="otherinfo" style="font-size:16px; width:500px; height:100px" required></textarea>
				 <input type="submit" value="Submit" class="btn btn-primary" style="margin:20px 0 0 0; font-size:18px;"> <br><br><br>
				 </div>
			 </form>
			 </div>
			 </div>
			
			<?php
				require 'vendor/autoload.php';
				$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
				$ncdb = $con->ncdb;
				$faccoll = $ncdb->facilities;
				
				if(isset($_POST['fac']))
				{
					$fac = $_POST['fac'];
					//echo $fac;
				}
				if(isset($_POST['type']))
				{
					$type = $_POST['type'];
					//echo $type;
				}
				if(isset($_POST['name']))
				{
					$name = $_POST['name'];
					//echo $name;
				}
				if(isset($_POST['address']))
				{
					$add = $_POST['address'];
					//echo $add;
				}
				if(isset($_POST['city']))
				{
					$city = $_POST['city'];
					//echo $city;
				}
				if(isset($_POST['pincode']))
				{
					$pincode = $_POST['pincode'];
					//echo $pincode;
				}
				if(isset($_POST['state']))
				{
					$state = $_POST['state'];
					//echo $state;
				}
				if(isset($_POST['phone']))
				{
					$phone = $_POST['phone'];
					//echo $phone;
				}
				if(isset($_POST['av']))
				{
					$av = $_POST['av'];
					//echo $av;
				}
				if(isset($_POST['monetary']))
				{
					$monetary = $_POST['monetary'];
					//echo $monetary;
				}
				if(isset($_POST['oo']))
				{
					$oo = $_POST['oo'];
					//echo $oo;
					if(strcmp($oo, "online")==0)
					{
						if(isset($_POST['link']))
						{
							$link = $_POST['link'];
							//echo $link;
						}
					}
				}
				if(isset($_POST['otherinfo']))
				{
					$otherinfo = $_POST['otherinfo'];
					//echo $otherinfo;
				}
				if(isset($_POST['fac']) && isset($_POST['type']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['city']) && 
				isset($_POST['pincode']) && isset($_POST['state']) && isset($_POST['phone']) && isset($_POST['av']) && isset($_POST['monetary']) && isset($_POST['oo']) && 
				isset($_POST['link']) && isset($_POST['otherinfo']))
				{
					if(strcmp($_POST['oo'],"online")==0)
					{
						if(strcmp($_POST['fac'],"Accommodation")==0)
						{
							$faccoll->insertOne(["id" => $idcnt, "facility" => $fac, "type" => $type, "name" => $name, "address" => $add, "city" => $city, "pincode" => $pincode,
							"state" => $state, "phone number" => $phone, "availability" => $av, "monetary details" => $monetary, "booking" => $oo, "booking link" => $link, 
							"other info" => $otherinfo, "owneremail" => $mail]);	
						}
						else
						{
							$faccoll->insertOne(["id" => $idcnt, "facility" => $fac, "type" => $type, "name" => $name, "address" => $add, "city" => $city, "pincode" => $pincode,
							"state" => $state, "phone number" => $phone, "monetary details" => $monetary, "booking" => $oo, "booking link" => $link, 
							"other info" => $otherinfo, "owneremail" => $mail]);	
						}
					}
					else
					{
						if(strcmp($_POST['fac'],"Accommodation")==0)
						{
							$faccoll->insertOne(["id" => $idcnt, "facility" => $fac, "type" => $type, "name" => $name, "address" => $add, "city" => $city, "pincode" => $pincode,
							"state" => $state, "phone number" => $phone, "availability" => $av, "monetary details" => $monetary, "booking" => $oo, "booking link" => "NA", 
							"other info" => $otherinfo, "owneremail" => $mail]);	
						}
						else
						{
							$faccoll->insertOne(["id" => $idcnt, "facility" => $fac, "type" => $type, "name" => $name, "address" => $add, "city" => $city, "pincode" => $pincode,
							"state" => $state, "phone number" => $phone, "monetary details" => $monetary, "booking" => $oo, "booking link" => "NA", 
							"other info" => $otherinfo, "owneremail" => $mail]);	
						}
					}
				}
			?>
			
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
