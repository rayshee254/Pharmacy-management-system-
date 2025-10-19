
<?php
	include "config.php";
	$customer_id = $_GET['cid'];
	
$sql = "DELETE FROM customers WHERE `Customer ID`='$customer_id'";

	if ($conn->query($sql)) {
		header("location:Customers-view.php");
	} else {
		echo "error";
	}
?>
