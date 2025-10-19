<?php
		$conn = mysqli_connect("localhost", "root", "", "quickfix pharmacy");
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
?>