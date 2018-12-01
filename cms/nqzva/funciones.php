<?php

session_start();
include_once('../includes/connection.php');

$edittable=$_POST['selector'];
$N = count($edittable);
for($i=0; $i < $N; $i++)
{
	$result = $pdo->prepare("DELETE FROM articles WHERE article_id= :memid");
	$result->bindParam(':memid', $edittable[$i]);
	$result->execute();
}
header("location: index.php");


mysql_close($con);



?>