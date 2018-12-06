<?php
session_start();
include_once('../includes/connection.php');
//include_once('../includes/article.php');

//$article = new Article;

//if(isset($_GET['id'])){
    //$id = $_GET['id'];
   // $data = $article->fetch_data($id);
$id=$_GET['id'];
$cantidad = $_GET['cantidad'];
$con = "SELECT * FROM articles WHERE article_id = $id";
$query = $pdo->query($con);
$query->execute();

$data = $query->fetch();

?>

<!DOCTYPE html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS</title>
    <!--  HOJAS DE ESTILO EN CASCADA  -->
    <link rel="stylesheet" href="../assets/normalize.css">
    <link rel="stylesheet" href="../assets/skeleton.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body style="background-color: #f4f4f4; padding-bottom: 50px;">


<div class="container" style="margin-top: 50px;">
<div class="row">

        <span class="twelve columns centrar" style="background-color: #d4d4d4; color: #fff; margin-bottom: 2rem; padding: 10px 0;">
            <h2 style="margin: 0;">Agregar Cantidad</h2>
        </span>


        <form action="cantidad.php" method="post" autocomplete="">
            <input type="hidden" name="id" value="<?php echo $data['article_id'];?>">
            <input type="hidden" name="cantidadActual" value="<?php echo $data['article_cantidad'];?>">
            
            <h3 class="three columns"><?php echo $data['article_title'];?></h3>

            <p class="three columns" style="font-size: 18px;">Cantidad Actual:</p>
            <p class="one columns" style="font-size: 18px;"><?php echo $data['article_cantidad'];?></p>

            <span class="five columns" style="margin: 0;">
                <p class="three columns" style="font-size: 18px;">Cantidad:</p>
                <input type="number" name="cantidad" id="cantidad" class="six columns" value="">
            </span>
            
            <span class="twelve columns centrar">
                <input type="submit" name="agregar" value="Actualizar Articulo">
            </span>

        </form>

</div>
<a href="index.php" style="color: #000; font-size: 20px;">&larr; REGRESAR</a>
</div>

    </div>

    
</div>




</body>
</html>

<?php 
//}
?>