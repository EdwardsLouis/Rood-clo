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



<div class="container">
<div class="row">

    <div class="twelve columns">
        <span class="twelve columns" style="font-size: 4rem; font-family: k2dbold; margin-bottom: 15px;">HOMBRE</span>
    </div>


    <div class="twelve columns" style="margin-bottom: 30px;">
        <span class="twelve columns" id="CHPlayeras" style="font-size: 4rem; font-family: k2dbold; display: ;">Playeras</span>
        <span class="twelve columns" style="margin-bottom: 20px;">

                <?php 
                $query = $pdo->query("SELECT article_id, article_img, article_genero, article_categoria FROM articles WHERE article_genero = 'Hombre' AND article_categoria = 'Playera' ORDER BY article_id DESC");
                foreach($query as $article){ 
                ?>
                    <a href="articulo.php?id=<?php echo $article['article_id'];?>">
                        <span class="two columns img" style="background-image: url('images/articulos/<?php echo $article["article_img"]; ?>'); background-position: center; background-size: cover; background-repeat: no-repeat; height: 450px; cursor: pointer;"></span>
                    </a>

                <?php } ?>
        </span>
    </div>
    <div class="twelve columns" style="margin-bottom: 30px;">
        <span class="twelve columns" id="CHSudaderas" style="font-size: 4rem; font-family: k2dbold; display: ;">Sudaderas</span>
        <span class="twelve columns" style="margin-bottom: 20px;">

                <?php 
                $query = $pdo->query("SELECT article_id, article_img, article_genero, article_categoria FROM articles WHERE article_genero = 'Hombre' AND article_categoria = 'Sudadera' ORDER BY article_id DESC");
                foreach($query as $article){ 
                ?>
                    <a href="articulo.php?id=<?php echo $article['article_id'];?>">
                        <span class="two columns img" style="background-image: url('images/articulos/<?php echo $article["article_img"]; ?>'); background-position: center; background-size: cover; background-repeat: no-repeat; height: 450px; cursor: pointer;"></span>
                    </a>

                <?php } ?>
        </span>
    </div>

</div>
</div>




<?php include('footer.php'); ?>



</body>