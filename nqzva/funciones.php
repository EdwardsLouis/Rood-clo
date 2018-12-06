<?php

session_start();
include_once('../includes/connection.php');

if(isset($_POST['selector'])){
	$edittable=$_POST['selector'];
	$N = count($edittable);
	for($i=0; $i < $N; $i++)
	{
		$result = $pdo->prepare("DELETE FROM articles WHERE article_id= :memid");
		$result->bindParam(':memid', $edittable[$i]);
		$result->execute();
		header('Location: index.php');
	}
}

elseif(isset($_POST['eliminarVendido'])){
	$eliminarVendido=$_POST['eliminarVendido'];
	$N = count($eliminarVendido);
	for($i=0; $i < $N; $i++)
	{
		$result = $pdo->prepare("DELETE FROM vendido WHERE vendido_id= :memid");
		$result->bindParam(':memid', $eliminarVendido[$i]);
		$result->execute();

		if(true){
			$id = $_POST["id"];
			$cantidadActual = $_POST["cantidadActual"];
			$vendido = $_POST["vendido"];

			$devolucion = $cantidadActual + $vendido;

			$statement = $pdo->prepare("UPDATE articles SET article_cantidad = :devolucion WHERE article_id = :id");
			$statement->bindParam(":id", $id);
			$statement->bindParam(":devolucion", $devolucion);
			$statement->execute();
		}

		header('Location: vendido.php');
	}
}

elseif (isset($_POST['agregar'])) {
	echo $_POST["id"];
	$agregar = $_POST['agregar2'];
	
	$statement = $pdo->prepare('UPDATE articles SET article_cantidad = article_cantidad + :agregar2 WHERE article_id = 11');

	$statement->bindParam(":agregar2", $agregar);

	$statement->execute();
	//header('Location: index.php');
}

elseif(isset($_POST['vendido'])){

	$vender = $_POST['vendido'];

	$query = $pdo->prepare('');

	$result->execute();
	header('Location: index.php');
}


?>