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

    <div class="twelve columns centrar">
        <span style="font-size: 4rem; font-family: k2dbold; margin-bottom: 15px;">CONTACTO</span>
    </div>

    <div class="twelve columns">
        <form action="includes/correo.php" method="POST">
            <input type="text" name="nombre" id="" placeholder="Nombre..." class="twelve columns">
            <input type="email" name="email" id="" placeholder="Correo..." class="twelve columns">
            <textarea name="consulta" id="" cols="30" rows="10" class="twelve columns" placeholder="Escribenos tus ideas..."></textarea>
            <span class="twelve columns centrar">
                <input type="submit" value="Enviar :)">
            </span>
        </form>

    </div>

</div>
</div>




<?php include('footer.php'); ?>



</body>