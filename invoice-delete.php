<?php
  include "config.php";

  $invoice_id = $_GET['id']; 

  if (isset($invoice_id) && is_numeric($invoice_id)) {
    $sql = "DELETE FROM invoices WHERE `INVOICE ID` = $invoice_id"; 
    if ($conn->query($sql)) {
		header("location:invoices-view.php");
	} else {
		echo "error";
	}
  }
?>