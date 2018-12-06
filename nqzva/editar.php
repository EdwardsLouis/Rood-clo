<?php
session_start();
include_once('../includes/connection.php');
//include_once('../includes/article.php');

//$article = new Article;

//if(isset($_GET['id'])){
    //$id = $_GET['id'];
   // $data = $article->fetch_data($id);
$id=$_GET['id'];
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
            <h2 style="margin: 0;">Editar Articulo</h2>
        </span>


        <form action="modificar.php" method="post" autocomplete="">
        <input type="hidden" name="id" value="<?php echo $data['article_id'];?>">
        <p class="three columns" style="margin-left: 0;">Nombre:</p>
        <input type="text" name="title" id="" style="margin-left: 0;" class="three columns" id="nombre" placeholder="Nombre" value="<?php echo $data['article_title'];?>">
            <span class="six columns">
                    <p class="four columns">Categoria</p>
                    <select name="categoria" id="categoria" class="eight columns">
                        <option selected  hidden value="<?php echo $data['article_categoria'];?>"><?php echo $data['article_categoria'];?></option>
                        <option value="Playera">Playera</option>
                        <option value="Sudadera">Sudadera</option>
                        <option value="Gorra">Gorra</option>
                        <option value="Anillo">Anillo</option>
                    </select>
                </span>

            <span class="twelve columns">
            
                <span class="six columns">
                    <p class="twelve columns">Tallas</p>
                    <select name="tallas" id="talla" class="twelve columns">
                    <option selected  hidden value="<?php echo $data['article_tallas'];?>"><?php echo $data['article_tallas'];?></option>
                        <option value="xS">xS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="xL">xL</option>
                    </select>
                </span>

                <span class="six columns">
                    <p class="twelve columns">Imagenes</p>
                    <input type="text" name="img" id="" class="twelve columns" style="margin: 0;" value="<?php echo $data['article_img'];?>">
                </span>


            </span>

            <span class="six columns" style="margin:0;">
                <p class="three columns">Precio</p>
                <p class="one columns">$</p>
                <input type="number" name="precio" id="precio" class="eight columns" value="<?php echo $data['article_precio'];?>">
            </span>

            <span class="six columns">
                <p class="three columns">Para:</p>
                <select name="genero" id="genero" class="nine columns">
                <option selected  hidden value="<?php echo $data['article_genero'];?>"><?php echo $data['article_genero'];?></option>
                    <option value="Mujer">Mujer</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Accesorio">Accesorio</option>
                </select>
            </span>

            <span class="six columns" style="margin: 0;">
                <p class="three columns">Cantidad</p>
                <input type="number" name="cantidad" id="cantidad" class="nine columns" value="<?php echo $data['article_cantidad'];?>">
            </span>
            
            <input type="text" name="sku" id="sku" class="six columns" placeholder="SKU" value="<?php echo $data['article_sku'];?>">

            <textarea name="content" id="descripcion" cols="30" rows="10" class="twelve columns" placeholder="Descripción..."><?php echo $data['article_content'];?></textarea>

            <span class="twelve columns centrar">
                <input type="submit" name="modificar" value="Editar Articulo">
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