<?php
	require 'vendor/autoload.php';
	try 
	{
        // connect to OVHcloud Public Cloud Databases for MongoDB (cluster in version 4.4, MongoDB PHP Extension in 1.8.1)
        $con = new MongoDB\Client('mongodb+srv://khushi:khushi123@cluster-nc.nm1fy.mongodb.net/ncdb?retryWrites=true&w=majority');
        echo "Connection to database successfully";
        // display the content of the driver, for diagnosis purpose
        //var_dump($con);
    }
    catch (Throwable $e) 
	{
        // catch throwables when the connection is not a success
        echo "Captured Throwable for connection : " . $e->getMessage() . PHP_EOL;
    }
	
	$db = $con->ncdb;
	$admincoll = $db->admin;
	$admincoll->deleteOne(['fname' => "Khushi"]);
?>