<?php
	session_start();
	require 'vendor/autoload.php';
	$con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
	$db = $con->ncdb;
	$reportedcoll = $db->reported;
	$buyercoll = $db->buyer;
	$sellercoll = $db->seller;
	$facilitiescoll = $db->facilities;
	$admincoll = $db->admin;
	$mail = $_SESSION['em'];
	if($mail)
	{
		$ans = array("email" => $mail);
		$res = $admincoll->findOne($ans);
		$username=$res->jsonSerialize()->uname ;
	}
	else
	{
		$username="username";
	}
?>

<!DOCTYPE html>

<html>
      <head>
            <title>Admin page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
            <script type="text/javascript" src="bootstrap/js/jquery-3.5.1.min.js"> </script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
			 <script type="text/javascript" src="../../jqwidgets/jqxcheckbox.js"></script>
			<link href="ncprojectcss.css?<?=filemtime("ncprojectcss.css")?>" rel="stylesheet" type="text/css"/>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			

			<script type="text/javascript">
				window.history.forward();
				function noBack() {
					window.history.forward();
				}
			</script>
			
			<style>
			.dropdown button i:hover
			{
				color: white;
			}
			.dropdown-content a:hover
			{
				color: black;
			}
			</style>
			
<script>
var flag=1;
	
function createnewadmin()
{
	if(flag!=0)
	{
		remele();
	}
	document.getElementById("cnao").style.color = "white";
	document.getElementById("cna").style.display = '';
	flag=1;
}
function remcna()
{
	document.getElementById("cna").style.display = "none";
	document.getElementById("cnao").style.color = "#818181";
}
function reportedentries()
{
	if(flag!=0)
	{
		remele();
	}
	document.getElementById("reo").style.color = "white";
	document.getElementById("re").style.display = '';
	flag=2;
}
function remre()
{
	var elem=document.getElementById("re").style.display = "none";
	document.getElementById("reo").style.color = "#818181";
}
function fetchbuyers()
{
	if(flag!=0)
	{
		remele();
	}
	document.getElementById("fbo").style.color = "black";
	document.getElementById("fb").style.display = '';
	flag=3;
}
function remfb()
{
	document.getElementById("fb").style.display = "none";
	document.getElementById("fbo").style.color = "#818181";
}	
function fetchsellers()
{
	if(flag!=0)
	{
		remele();
	}
	document.getElementById("fso").style.color = "black";
	document.getElementById("fs").style.display = '';
	flag=4;
}
function remfs()
{
	document.getElementById("fs").style.display = "none";
	document.getElementById("fso").style.color = "#818181";
}	
function fetchfacilities()
{
	if(flag!=0)
	{
		remele();
	}
	document.getElementById("ffo").style.color = "black";
	document.getElementById("ff").style.display = '';
	flag=5;
}
function remff()
{
	document.getElementById("ff").style.display = "none";
	document.getElementById("ffo").style.color = "#818181";
}	
function fetchadmins()
{
	if(flag!=0)
	{
		remele();
	}
	document.getElementById("fao").style.color = "black";
	document.getElementById("fa").style.display = '';
	flag=6;
}
function remfa()
{
	document.getElementById("fa").style.display = "none";
	document.getElementById("fao").style.color = "#818181";
}	
function remele()
{
	if(flag==1)
	{
		remcna();
	}
	else if(flag==2)
	{
		remre();
	}
	else if(flag==3)
	{
		remfb();
	}
	else if(flag==4)
	{
		remfs();
	}
	else if(flag==5)
	{
		remff();
	}
	else if(flag==6)
	{
		remfa();
	}
	flag=0;
}
</script>		
            
      </head>
      <body>
            <div class="navbar navbar-inverse navbar-fixed-top"> 
                <div class="container header"> 
                    <div class="navbar-header"> 
                        <h3 style="margin-top: -5px">Newbie's Companion
                            <div class="dropdown" style="right:-795px">
                               <h3 class="glyphicon glyphicon-user" style="margin-left:100px"><span style="padding-left: 10px"><?php echo $username; ?></span></h3>
                            </div>
                        </h3>
                    </div>
                </div>
            </div>
			 
			<div class="sidenav" style="height:100%; width:300px">
			  <div class="dropdown" style="padding-left:65px">
				<button class="dropbtn" style="all:unset; font-size:24px; color:#818181; padding-bottom:6px">Fetch Entries&nbsp;
				  <i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content" style="min-width:215px">
				  <a href="#buyers" id="fbo" onclick="fetchbuyers()" style="font-size:22px; padding: 1px 0 0 0">Fetch Buyers</a>
				  <a href="#sellers" id="fso" onclick="fetchsellers()" style="font-size:22px; padding: 5px 0 0 0">Fetch Sellers</a>
				  <a href="#facilities" id="ffo" onclick="fetchfacilities()" style="font-size:22px; padding: 5px 0 0 0">Fetch Facilities</a>
				  <a href="#admins" id="fao" onclick="fetchadmins()" style="font-size:22px; padding: 5px 0 0 0">Fetch Admins</a>
				</div>
			  </div>
			  <a href="#reportedentries" id="reo" onclick="reportedentries()" style="padding-left:65px; padding-top:20px">Reported Entries</a>
			  <a href="#createnewadmin" id="cnao" onclick="createnewadmin()" style="padding-left:65px; padding-top:20px">Create New Admin</a>
			  <a href="logout.php" style="padding-left:65px; padding-top:20px">Logout</a>
			</div>


			<div class="main">
			<!-- FETCH ENTRIES -->
			<!-- BUYERS -->
			<div class="container" id="fb" style="display:none; margin-bottom: 137px">
				<h2 style="margin-top:5px; margin-bottom:20px">Buyers</h2>
				<div class="container">
				 <div class="row">
				   <div class="col-sm-8" style="left:-13px">
					<div class="table-responsive">
					  <table class="table table-bordered">
					   <thead style="font-size:18px; text-align:center"><tr><td style="width:75px">Sr. No.</td>
						 <td>First Name</td>
						 <td>Last Name</td>
						 <td>Email id</td>
						 <td>Phone Number</td>
						 <td>Username</td>
						 <td>Action</td>
					</thead>
					<tbody>
						<?php
							$fetchdatab = $buyercoll->find();
							$sn = 1;
							foreach($fetchdatab as $datab)
							{ ?>
								<tr>
								  <td style="font-size:17px"><?php echo $sn; ?></td>
								  <td style="font-size:17px"><?php echo $datab['fname']; ?></td>
								  <td style="font-size:17px"><?php echo $datab['lname']; ?></td>
								  <td style="font-size:17px"><?php echo $datab['email']; ?></td>
								  <td style="font-size:17px"><?php echo $datab['phone']; ?></td>
								  <td style="font-size:17px"><?php echo $datab['uname']; ?></td>
								  <td><a href="admin.php?delete=<?php echo $did = $datab['id']; ?>" class="btn btn-danger" style="font-size:17px">Delete</a></td>
								</tr>
							<?php
							$sn++;
							}
						?>
						<?php
							if(isset($_GET['delete']))
							{
								$buyercoll->deleteOne(["id" => $did]);
								echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost:8081/test/admin.php">';
							}
						?>
					</tbody>
					 </table>
				   </div>
				</div>
				</div>
				</div>
			</div>
			
			<!-- SELLERS -->
			<div class="container" id="fs" style="display:none; margin-bottom: 137px">
				<h2 style="margin-top:5px; margin-bottom:20px">Sellers</h2>
				<div class="container">
				 <div class="row">
				   <div class="col-sm-8" style="left:-13px">
					<div class="table-responsive">
					  <table class="table table-bordered">
					   <thead style="font-size:18px; text-align:center"><tr><td style="width:75px">Sr. No.</td>
						 <td>First Name</td>
						 <td>Last Name</td>
						 <td>Email id</td>
						 <td>Phone Number</td>
						 <td>Username</td>
						 <td>Action</td>
					</thead>
					<tbody>
						<?php
							$fetchdatas = $sellercoll->find();
							$sn = 1;
							foreach($fetchdatas as $datas)
							{ ?>
								<tr>
								  <td style="font-size:17px"><?php echo $sn; ?></td>
								  <td style="font-size:17px"><?php echo $datas['fname']; ?></td>
								  <td style="font-size:17px"><?php echo $datas['lname']; ?></td>
								  <td style="font-size:17px"><?php echo $datas['email']; ?></td>
								  <td style="font-size:17px"><?php echo $datas['phone']; ?></td>
								  <td style="font-size:17px"><?php echo $datas['uname']; ?></td>
								  <td><a href="admin.php?delete1=<?php echo $did = $datas['id']; ?>" class="btn btn-danger" style="font-size:17px">Delete</a></td>
								</tr>
							<?php
							$sn++;
							}
						?>
						<?php
							if(isset($_GET['delete1']))
							{
								$sellercoll->deleteOne(["id" => $did]);
								echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost:8081/test/admin.php">';
							}
						?>
					</tbody>
					 </table>
				   </div>
				</div>
				</div>
				</div>
			</div>
			
			<!-- FACILITIES -->
			<div class="container" id="ff" style="display:none; margin-bottom: 137px">
				<h2 style="margin-top:5px; margin-bottom:20px">Facilities</h2>
				<div class="container">
				 <div class="row">
				   <div class="col-sm-10" style="left:-13px">
					<div class="table-responsive">
					  <table class="table table-bordered">
					   <thead style="font-size:18px; text-align:center"><tr><td style="width:75px">Sr. No.</td>
						 <td>Facility</td>
						 <td>Type</td>
						 <td>Name</td>
						 <td>Address</td>
						 <td>City</td>
						 <td>Pincode</td>
						 <td>State</td>
						 <td>Phone Number</td>
						 <td>Availability</td>
						 <td>Monetary Details</td>
						 <td>Booking</td>
						 <td>Booking Link</td>
						 <td>Other Info</td>
						 <td>Owner Email id</td>
						 <td>Action</td>
					</thead>
					<tbody>
						<?php
							$fetchdataf = $facilitiescoll->find();
							$sn = 1;
							foreach($fetchdataf as $dataf)
							{ ?>
								<tr>
								  <td style="font-size:17px"><?php echo $sn; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['facility']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['type']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['name']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['address']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['city']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['pincode']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['state']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['phone number']; ?></td>
								  <td style="font-size:17px; text-align:center"><?php if(isset($dataf['availability'])){echo $dataf['availability'];}else{echo "-";} ?></td>
								  <td style="font-size:17px"><?php echo $dataf['monetary details']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['booking']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['booking link']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['other info']; ?></td>
								  <td style="font-size:17px"><?php echo $dataf['owneremail']; ?></td>
								  <td><a href="admin.php?delete2=<?php echo $did = $dataf['id']; ?>" class="btn btn-danger"  style="font-size:17px">Delete</a></td>
								</tr>
							<?php
							$sn++;
							}
						?>
						<?php
							if(isset($_GET['delete2']))
							{
								$facilitiescoll->deleteOne(["id" => $did]);
								echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost:8081/test/admin.php">';
							}
						?>
					</tbody>
					 </table>
				   </div>
				</div>
				</div>
				</div>
			</div>
			
			<!-- ADMINS -->
			<div class="container" id="fa" style="display:none; margin-bottom: 137px">
				<h2 style="margin-top:5px; margin-bottom:20px">Admins</h2>
				<div class="container">
				 <div class="row">
				   <div class="col-sm-8" style="left:-13px">
					<div class="table-responsive">
					  <table class="table table-bordered">
					   <thead style="font-size:18px; text-align:center"><tr><td style="width:75px">Sr. No.</td>
						 <td>First Name</td>
						 <td>Last Name</td>
						 <td>Email id</td>
						 <td>Phone Number</td>
						 <td>Username</td>
						 <td>Action</td>
					</thead>
					<tbody>
						<?php
							$fetchdataa = $admincoll->find();
							$sn = 1;
							foreach($fetchdataa as $dataa)
							{ ?>
								<tr>
								  <td style="font-size:17px"><?php echo $sn; ?></td>
								  <td style="font-size:17px"><?php echo $dataa['fname']; ?></td>
								  <td style="font-size:17px"><?php echo $dataa['lname']; ?></td>
								  <td style="font-size:17px"><?php echo $dataa['email']; ?></td>
								  <td style="font-size:17px"><?php echo $dataa['phone']; ?></td>
								  <td style="font-size:17px"><?php echo $dataa['uname']; ?></td>
								  <td><a href="admin.php?delete3=<?php echo $did = $dataa['id']; ?>" class="btn btn-danger" onclick="fetchadmins()" style="font-size:17px">Delete</a></td>
								</tr>
							<?php
							$sn++;
							}
						?>
						<?php
							if(isset($_GET['delete3']))
							{
								$admincoll->deleteOne(["id" => $did]);
								echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost:8081/test/admin.php">';
							}
						?>
					</tbody>
					 </table>
				   </div>
				</div>
				</div>
				</div>
			</div>
			
			
			<!-- REPORTED ENTRIES -->
			<div class="container" id="re" style="display:none; margin-bottom: 137px">
				<h2 style="margin-top:5px; margin-bottom:20px">Reported Entries</h2>
				<div class="container">
				 <div class="row">
				   <div class="col-sm-8" style="left:-13px">
					<div class="table-responsive">
					  <table class="table table-bordered">
					   <thead style="font-size:18px; text-align:center"><tr><td style="width:75px">Sr. No.</td>
						 <td>Reported Entries</td>
						 <td>Action</td>
					</thead>
					<tbody>
						<?php
							$fetchdata = $reportedcoll->find();
							$sn = 1;
							foreach($fetchdata as $data)
							{ ?>
								<tr>
								  <td style="font-size:17px"><?php echo $sn; ?></td>
								  <td style="font-size:17px"><?php echo '<b>'.$data['uname'].'</b>'." reported ".'<b>'.$data['pname'].'</b>'." (id:".$data['pid'].") as fake on ".'<b>'.$data['timestamp'].'</b>'."."; ?></td>
								  <td><a href="admin.php?delete4=<?php echo $did = $data['id']; ?>" class="btn btn-danger" style="font-size:17px">Delete</a></td>
								</tr>
							<?php
							$sn++;
							}
						?>
						<?php
							if(isset($_GET['delete4']))
							{
								$reportedcoll->deleteOne(["id" => $did]);
								echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost:8081/test/admin.php">';
							}
						?>
					</tbody>
					 </table>
				   </div>
				</div>
				</div>
				</div>
			</div>
			
			<!-- CREATE NEW ADMIN -->
			<div class="container" id="cna">
				<h2 style="margin-top: 5px">Create New Admin</h2>
				<div class="col-xs-6 " style="margin-left: -15px; padding-top: 10px">
                    <form method = "post" action = "cnascript.php">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" name="fname" placeholder="First Name" required><br>
                            <input type="text" class="form-control input-lg" name="lname" placeholder="Last Name" required><br>
                            <input type="text" class="form-control input-lg" name="email" placeholder="Email" required><br>
                            <input type="text" class="form-control input-lg" name="phone" placeholder="Phone Number" required><br>
                            <input type="text" class="form-control input-lg" name="uname" placeholder="Username" required><br>              
							<input type="submit" value="Submit" class="btn btn-primary" style="margin:5px 0 20px 0; font-size: 18px">
                        </div>
                    </form>
                </div>
			</div>
			
			</div>
				
				
           <footer>	  
					  <div style="float:left; padding-left:150px; padding-top:10px; margin-left:240px">
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
