<?php
	require 'connect.php';
	
	$stat = $conn->prepare("select track_icon from track where track_id=3");
	
	$stat ->execute;
	$stat = $stat->fetch();
	header('Content-Type:'.$row['image/jpeg']);
	echo $row['data'];
	?>