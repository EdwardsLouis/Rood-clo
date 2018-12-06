<?php
session_start();
include_once('../includes/connection.php');
if(isset($_SESSION['logged_in'])){
    //display add page
    if(isset($_POST['title'])){
  
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);
        $img = $_POST['img'];
        $categoria = $_POST['categoria'];
        $tallas = $_POST['tallas'];
        $precio = $_POST['precio'];
        $genero = $_POST['genero'];
        $cantidad = $_POST['cantidad'];
        $sku = $_POST['sku'];
        

        if(empty($title) or empty($content) or empty($precio) or empty($img)){
            $error = 'All fields are required!';
        } else{
            $query = $pdo->prepare('INSERT INTO articles (article_title, article_content, article_timestamp, article_img, article_categoria, article_tallas, article_precio, article_genero, article_cantidad, article_sku) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            
            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, time());
            $query->bindValue(4, $img);
            $query->bindValue(5, $categoria);
            $query->bindValue(6, $tallas);
            $query->bindValue(7, $precio);
            $query->bindValue(8, $genero);
            $query->bindValue(9, $cantidad);
            $query->bindValue(10, $sku);


            $query->execute();

            header('Location: index.php');
        }
    }
    

?>
<html lang="es">
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
        <?php if(isset($error)){?>
            <small style="color: red;"><?php echo $error;?></small>
            <br><br>
        <?php } ?>
      <!--  <form action="add.php" method="post" autocomplete="off">
            <input class="twelve columns" type="text" name="title" placeholder="Title">
            <textarea name="content" id="" cols="50" rows="15" placeholder="Content"></textarea>
            <input class="twelve columns" type="file" name="img" id="">
            <span class="twelve columns centrar">
            <input type="submit" value="Add Article">
            </span>
        </form> -->

        <span class="twelve columns centrar" style="background-color: #d4d4d4; color: #fff; margin-bottom: 2rem; padding: 10px 0;">
            <h2 style="margin: 0;">Articulo</h2>
        </span>

        <form action="add.php" method="post" autocomplete="off">
            <input type="text" name="title" id="" class="six columns" placeholder="Nombre">
            <span class="six columns">
                    <p class="four columns">Categoria</p>
                    <select name="categoria" id="" class="eight columns">
                        <option value="Playera">Playera</option>
                        <option value="Sudadera">Sudadera</option>
                        <option value="Gorra">Gorra</option>
                        <option value="Anillo">Anillo</option>
                    </select>
                </span>

            <span class="twelve columns">
            
                <span class="six columns">
                    <p class="twelve columns">Tallas</p>
                    <select name="tallas" id="" class="twelve columns">
                        <option value="--">--</option>
                        <option value="xS">xS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="xL">xL</option>
                    </select>
                </span>

                <span class="six columns">
                    <p class="twelve columns">Imagenes</p>
                    <input type="file" name="img" id="" class="twelve columns" style="margin: 0;">
                </span>


            </span>

            <span class="six columns" style="margin:0;">
                <p class="three columns">Precio</p>
                <p class="one columns">$</p>
                <input type="number" name="precio" id="" class="eight columns">
            </span>

            <span class="six columns">
                <p class="three columns">Para:</p>
                <select name="genero" id="" class="nine columns">
                    <option value="Mujer">Mujer</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Accesorio">Accesorio</option>
                </select>
            </span>

            <span class="six columns" style="margin: 0;">
                <p class="three columns">Cantidad</p>
                <input type="number" name="cantidad" id="" class="nine columns">
            </span>
            
            <input type="text" name="sku" id="" class="six columns" placeholder="SKU">

            <textarea name="content" id="" cols="30" rows="10" class="twelve columns" placeholder="Descripción..."></textarea>

            <span class="twelve columns centrar">
                <input type="submit" value="Guardar Articulo">
            </span>

        </form>


    </div>
</div>




<div class="container" style="margin-top:50px;">
<div class="row">

<span class="twelve columns centrar" style="background-color: #d4d4d4; color: #fff; margin-bottom: 2rem; padding: 10px 0;">
    <h2 style="margin: 0 ;">Publicidad</h2>
</span>

<?php

if(isset($_POST['bannerslider'])){
  
    $bannerslider = $_POST['bannerslider'];

    $query = $pdo->prepare('INSERT INTO banners (banner_slider) VALUES (?)');
        
    $query->bindValue(1, $bannerslider);

    $query->execute();

   // header('Location: index.php');

}

?>


<form action="add.php" method="post">
    <span class="twelve columns">
            <p class="six columns">Slider:</p>
            <input type="file" name="bannerslider" id="" class="six columns">
    </span>

    <span class="twelve columns centrar">
        <input type="submit" value="Guardar Publicidad">
    </span>
</form>

<?php

if(isset($_POST['hmmujer'],$_POST['hmhombre'])){
  
    $hmmujer = $_POST['hmmujer'];
    $hmhombre = $_POST['hmhombre'];
    
    $query = $pdo->prepare('INSERT INTO hm (hm_mujer, hm_hombre) VALUES (?, ?)');
        
    $query->bindValue(1, $hmmujer);
    $query->bindValue(2, $hmhombre);


    $query->execute();

    //header('Location: index.php');

}

?>


<form action="add.php" method="post">
<span class="twelve columns">
            <p class="six columns">Img Mujer:</p>
            <input type="file" name="hmmujer" id="" class="six columns">
    </span>
    <span class="twelve columns">
            <p class="six columns">Img Hombre:</p>
            <input type="file" name="hmhombre" id="" class="six columns">
    </span>

    <span class="twelve columns centrar">
        <input type="submit" value="Guardar Categoria">
    </span>
</form>

</div>

<a href="index.php" style="color: #000; font-size: 20px;">&larr; REGRESAR</a>

</div>


</body>
</html>

<?php
} else {
    header('Location: index.php');
}
?>