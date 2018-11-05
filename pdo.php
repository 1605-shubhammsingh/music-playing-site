<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=musicF','root','');
// See the "error" folder for the details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>