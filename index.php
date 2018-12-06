<?php
include_once('includes/connection.php');
include_once('includes/article.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ROOD CLO.</title>

    <script src="assets/js/jquery-3.3.1.js"></script>

    <link rel="stylesheet" href="assets/normalize.css">
    <link rel="stylesheet" href="assets/skeleton.css">
    <link rel="stylesheet" href="assets/style.css">

    <link rel="stylesheet" href="assets/icomoon/style.css">

    <link rel="stylesheet" href="assets/sss/sss2.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/sss/sss.js"></script>

<script>
jQuery(function($) {
	$('.slider').sss({

	// enable the auto-rotation mode.
	slideShow : true,

	// slide to display first
	startOn : 0,

	// animation speed
	speed : 8000,

	// transition delay
	transition : 600,

	// enable arrows navigation
	arrows : true

	});
});
</script>

</head>
<body>

<?php include('header.php'); ?>

    <div class="" style="width: 100%; background-color: ; margin-bottom: 100px;">
            <div class="row">
                <span class="twelve columns centrar" style="height: 500px; padding: 0;">
                        <span class="slider" style="width: 100%;">
<?php $query = $pdo->query("SELECT banner_id, banner_slider FROM banners ORDER BY banner_id DESC LIMIT 3"); 

foreach($query as $article){ 
?>
                            <span class="ssslider" style="height: 500px;">
                                <span class="twelve columns" style="height: inherit;">
                                    <img onclick="location.href='#'" src="images/<?php echo $article["banner_slider"]; ?>" alt="Imagen Publicitaria" class="twelve columns" style="cursor: pointer;">
                                </span>
                            </span>
<?php } ?>
                        </span>
                    </span>
            </div>
    </div>

    <div class="" style="width: 100%; background-color: ; margin-bottom: 50px;">
        <div class="container">
            <div class="row">
                <span class="twelve columns centrar sec2" style="height: auto; padding: 0;">
<?php 

$query = $pdo->query("SELECT hm_id, hm_mujer, hm_hombre FROM hm ORDER BY hm_id DESC LIMIT 1");
foreach($query as $article){ 
?>          

                    <span onclick="location.href='CMujer.php'" class="six columns centrar" style="background-image: url('images/<?php echo $article["hm_mujer"]; ?>'); background-position: center; background-size: cover; background-repeat: no-repeat; height: 450px; cursor: pointer;">
                        <a href="CMujer.php" style="font-size: 38px; z-index: 1;">MUJER</a>
                    </span>
                    <span onclick="location.href='CHombre.php'" class="six columns centrar" style="background-image: url('images/<?php echo $article["hm_hombre"]; ?>'); background-position: center; background-size: cover; background-repeat: no-repeat; height: 450px; cursor: pointer;">
                        <a href="CHombre.php" style="font-size: 38px; z-index: 1;">HOMBRE</a>
</span> <?php } ?>
                </span>
            </div>
        </div>
    </div>

    <div class="" style="width: 100%;  margin-bottom: 5px;">
        <div class="container">
            <div class="row">
<?php 

$query = $pdo->query("SELECT article_id, article_img FROM articles ORDER BY article_id DESC LIMIT 9");

?>          
                <span class="twelve columns" style="margin-top: 4%;">
            <?php foreach($query as $article){ ?>
                    <img src="images/articulos/<?php echo $article["article_img"]; ?>" alt="" onclick="location.href='articulo.php?id=<?php echo $article['article_id'];?>'" class="four columns" style="margin: 0; cursor: pointer; height: 44%;">
            <?php } ?>
                </span>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?>


</body>
</html>


<!--
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS</title>
      HOJAS DE ESTILO EN CASCADA
    <link rel="stylesheet" href="assets/normalize.css">
    <link rel="stylesheet" href="assets/skeleton.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <div class="row">
    <a href="index.php" id="logo">CMS</a>
        <ol>
        <?php foreach ($articles as $article){ ?>
            <li><a href="article.php?id=<?php echo $article['article_id']; ?>"><?php echo $article['article_title']; ?></a> - posted  <small><?php echo date('l jS', $article['article_timestamp']); ?></small></li>
       <?php } ?>
        </ol>
        <br>
        <small><a href="admin">admin</a></small>
    </div>
</div>

</body>
</html>
-->