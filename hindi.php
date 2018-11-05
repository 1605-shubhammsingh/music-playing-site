<!doctype html>
<head>
<style>
#first{
    float:left;
	position:relative;
}


#second{
	float:left;
	margin-top:260px;
}



</style>

</head>
<link type="text/css" rel="stylesheet" href="stylesheetsongs.css">


<html>
<body>
<div class="topnav">
	<a href=home.html>Home</a>
	<a href=about.html>About</a>
	<a href=contact.html>Contact</a>
	<a href="index.php">Log Out</a>
	<form name="form1" method="POST" action="search.php">
		<input type="text" name="search" placeholder="Search..">
		</form>
</div> 
<div class="sidenav">
	<img src="logo.jpg"><br>
	<a href="#">Developed By:-</a>
	<a href="Shubham.html">Shubham Singh</a>
</div>
<header><h1><center> Welcome to Hindi Songs Library</center></h1></header>
<div id="randomdiv">

</div>


<?php 

require_once 'pdo.php';

$stmt = $pdo->query("SELECT icon,song_name,artist,file FROM song WHERE category='HINDI'");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
	echo '
	<div style="display:block;margin-left:300px;margin-top:5px;margin-bottom:5px;"><img src="';
	echo ($row['icon']);
	echo '" style="float:left;
										padding-left:20px;
										padding-right:10px;
										max-width:100px;
										max-height:100px;
										width: auto;
										height: auto;">
		<b><h2>';
	echo ($row['song_name']);
	echo '</h2>
			<a>--';
	echo ($row['artist']);
	echo '</a>
			<audio controls style="float:right;">
			<source src="';
	echo ($row['file']);
	echo '" type="audio/mpeg">
			Your browser does not support the audio element.
			</audio>
			</div></br>';
	
}

?>



</body>

</html>
