<?php
session_start();
include_once('../includes/connection.php');
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

<div class="container">
<div class="row centrar" style="margin-top: 30px;">
<h1>CORREOS DE BOLETIN</h1>
</div>
</div>

<div class="container">
<div class="row">


<?php 



$query = $pdo->query("SELECT * FROM boletin ORDER BY boletin_id DESC");


?>        
<form action="../includes/eliminarboletin.php" method="post">

<table class="u-full-width">

    <thead>
        <tr>
            <th>Correos</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach($query as $boletin){ ?>
        <tr>
            <td><?php echo $boletin["boletin_correo"]; ?></td>
        </tr>
            <?php } ?>
    </tbody>

</table>


</form>

</div>
</div>

<a href="index.php" style="color: #000; font-size: 20px;">&larr; REGRESAR</a>

</div>


</body>
</html>