<?php
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $article->fetch_data($id);
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

<div class="twelve columns" style="padding-top: 50px;">
    <div class="eight columns">
        <span class="twelve columns" style="background-color: tomato; height: 80%;">
            <img src="images/<?php echo $data['article_img']; ?>" alt="" style="height: 100%; width: 100%;">
        </span>
    </div>
    <div class="four columns">

        <span class="twelve columns" style="text-align: center;">
            <span class="twelve columns" style="font-size: 4rem; font-family: k2dbold; display: ;"><?php echo $data['article_title']; ?></span>
            <span class="twelve columns" style="font-size: 2.5rem; font-family: k2dregular; "><?php echo $data['article_categoria']; ?></span>
            <span class="twelve columns" style="font-size: 2rem; font-family: k2dregular; ">Tallas: <?php echo $data['article_tallas']; ?></span>
            <span class="twelve columns" style="font-size: 2rem; font-family: k2dregular; ">Disponibles: <?php echo $data['article_cantidad']; ?></span>
            <span class="twelve columns" style="font-size: 2rem; font-family: k2dregular; ">Para <?php echo $data['article_genero']; ?></span>
            <span class="twelve columns" style="font-size: 2rem; font-family: k2dregular; ">Precio: $<?php echo $data['article_precio']; ?></span>
            <span class="twelve columns" style="font-size: 2rem; font-family: k2dregular; ">Descripción: <?php echo $data['article_content']; ?></span>
        </span>

    </div>
</div>

</div>
</div>




<?php include('footer.php'); ?>



</body>

    <?php

} else{
   // header('Location: index.php');
    //exit();
}

?>

