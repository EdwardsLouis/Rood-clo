<?php 

include_once('../includes/connection.php');

if(isset($_POST['agregar'])){
    $id = $_POST['id'];
    $cantidadActual = $_POST['cantidadActual'];
    $cantidad = $_POST['cantidad'];
    
    $agregar = $cantidadActual + $cantidad;

    $con = "UPDATE articles SET article_cantidad = :cantidad WHERE article_id = :id";
    $statement = $pdo->prepare($con);
    $statement->bindParam(":cantidad", $agregar);
    $statement->bindParam(":id", $id);

    $statement->execute();

    header('Location: index.php');
    
}

/*elseif(isset($_POST['vendido'])){
    $id = $_POST['id'];

    $cantidadActual = $_POST['cantidadActual'];
    $cantidad = $_POST['cantidad'];
    
    $vendido = $cantidadActual - $cantidad;

    
    $con = "UPDATE articles SET article_cantidad = :cantidad WHERE article_id = :id";
    $statement = $pdo->prepare($con);
    $statement->bindParam(":cantidad", $vendido);
    $statement->bindParam(":id", $id);

    $statement->execute();

    header('Location: index.php');
    
}*/
elseif(isset($_POST['vendido'])){
    $id = $_POST['id'];

    //$title = $_POST['title'];

    //$cantidadActual = $_POST['cantidadActual'];
    $cantidad = $_POST['cantidad'];
    
    //$vendido = $cantidadActual - $cantidad;

    $con = "INSERT INTO vendido (vendido_articulo, vendido_cantidad) VALUES (?, ?)";
    $statement = $pdo->prepare($con);
    $statement->bindValue(1, $id);
    $statement->bindValue(2, $cantidad);

    $statement->execute();

    if(true){
        $cantidadActual = $_POST['cantidadActual'];

        $vendido = $cantidadActual - $cantidad;
    
        $con = "UPDATE articles SET article_cantidad = :cantidad WHERE article_id = :id";
        $statement = $pdo->prepare($con);
        $statement->bindParam(":cantidad", $vendido);
        $statement->bindParam(":id", $id);
    
        $statement->execute();    
    }

    header('Location: index.php');
    
}


?>
