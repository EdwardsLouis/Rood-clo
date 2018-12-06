<?php

session_start();
include_once('../includes/connection.php');
if (isset($_SESSION['logged_in'])){
    //display index
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
    <!-- ICONOS -->
    <link rel="stylesheet" href="../assets/icomoon/style.css">
    <script src="../assets/js/jquery-3.3.1.js"></script>

    <style>
    a:hover{
        text-decoration: none;
    }
    </style>

    <script>

    $(document).ready(function(){
        $('#checkboxall').click(function(){
            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });

        $('#delete').click(function(){
            var dataArr = new Array();
            if($('input:checkbox:checked').length > 0){
                $('input:checkbox:checked').each(function(){
                    dataArr.push($(this).attr('id'));
                    $(this).closest('tr').remove();
                });



            }else{
                alert('Sin seleccinar');
            }
        });


        function sendResponse(dataArr){
            $.ajax({
                type: 'post',
                url: 'delete.php',
                data: {'data' : dataArr},
                success: function(response){
                    alert(response);
                },
                error: function(errResponse){
                    alert(errResponse);
                }
            });
        }


    });

//FILTRADO CON SELECT

$(function(){
	var $tabla = $('#tabla');
	
	$('#filtroCategoria').change(function(){
		var value = $(this).val();
		if (value){
			$('tbody tr.' + value, $tabla).show();
			$('tbody tr:not(.' + value + ')', $tabla).hide();
		}
		else{
			// Se ha seleccionado All
			$('tbody tr', $tabla).show();
		}
	});
});

$(function(){
	var $tabla = $('#tabla');
	
	$('#filtroPara').change(function(){
		var value = $(this).val();
		if (value){
			$('tbody tr.' + value, $tabla).show();
			$('tbody tr:not(.' + value + ')', $tabla).hide();
		}
		else{
			// Se ha seleccionado All
			$('tbody tr', $tabla).show();
		}
	});
});


    </script>

</head>

<body style="background-color: #f4f4f4;">


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
<div class="row">
    <a href="add.php" class="four columns centrar opcionesIndex" style="height: 65px; background-color: #72B2FF; border-radius: 15px; box-shadow: #8e8e8e 0px 0px 9px 1px;">
        <p class="icon-plus" style="color: #fff; font-size: 48px; margin-bottom: 0;"></p>
    </a>
    <a href="boletin.php" class="four columns centrar opcionesIndex" style="height: 65px; background-color: #f7d151; border-radius: 15px; box-shadow: #8e8e8e 0px 0px 9px 1px;">
        <p class="icon-email" style="color: #fff; font-size: 32px; margin-bottom: 0;"></p>
        <p class="icon-archive" style="color: #fff; font-size: 32px; margin-bottom: 0;"></p>
    </a>
    <a href="logout.php" class="four columns centrar opcionesIndex" style="height: 65px; background-color: #ff5e5e; border-radius: 15px; box-shadow: #8e8e8e 0px 0px 9px 1px;">
        <p class="icon-log-out" style="color: #fff; font-size: 32px; margin-bottom: 0;"></p>
    </a>
    <a href="vendido.php" class="twelve columns centrar opcionesIndex" style="height: 65px; border-radius: 15px; box-shadow: #8e8e8e 0px 0px 9px 1px; background-color: #525252; margin-top: 15px;">
        <p class="icon-shopping-cart" style="color: #fff; font-size: 32px; margin-bottom: 0;"></p>
    </a>
</div>
</div>

<div class="container">
<div class="row">

    <form action="index.php" method="POST" style="display: none;">
        <input type="text" name="articulo" id="" class="eight columns" placeholder="Buscar...">
        <input type="submit" value="buscar" value="Buscar" class="four columns">
    </form>

</div>
</div>

<div class="container">
<div class="row">

<p class="one columns" style="font-size: 18px;">Filtrar:</p>
<p class="one columns">Categoria:</p>
<select name="" id="filtroCategoria" class="two columns">
    <option value="" >Todos</option>
    <option value="Playera">Playera</option>
    <option value="Sudadera">Sudadera</option>
    <option value="Gorra">Gorra</option>
    <option value="Anillo">Anillo</option>
</select>
<p class="one columns">Para:</p>
<select name="" id="filtroPara" class="two columns">
    <option value="">Todos</option>
    <option value="Mujer">Mujer</option>
    <option value="Hombre">Hombre</option>
    <option value="Accesorio">Accesorio</option>
</select>

</div>
</div>

<div class="container">
<div class="row">
<?php 


$query = $pdo->query("SELECT article_id, article_categoria, article_title, article_cantidad, article_tallas, article_genero FROM articles ORDER BY article_id DESC");


?>        
<form action="funciones.php" method="post">
    <table class="u-full-width" id="tabla">
        <thead>
            <tr>
                <th></th>
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Para</th>
                <th>Agregar</th>
                <th>Venidos</th>
                <th>Editar</th>
                <th><input type="submit" value="Eliminar" class="twelve columns eliminar"></th>
                <th><input type="checkbox" name="" id="checkboxall"></th>
            </tr>
        </thead>
        <tbody>

<?php 

foreach($query as $article){

 ?>

            <tr class="<?php echo $article["article_categoria"]; ?> <?php echo $article["article_genero"]; ?>">
                <td><input type="hidden" name="id" value="<?php echo $article["article_id"]; ?>"></td>
                <td><?php echo $article["article_categoria"]; ?></td>
                <td><?php echo $article["article_title"]; ?></td>
                <td><?php echo $article["article_cantidad"]; ?></td>
                <td><?php echo $article["article_genero"]; ?></td>
                <td><span class="centrar"><a href="agregarCantidad.php?id=<?php echo $article['article_id']; ?>&cantidad=<?php echo $article['article_cantidad']; ?>" class="icon-plus"></a></span></td>
                <td><span class="centrar"><a href="vendidoCantidad.php?id=<?php echo $article['article_id']; ?>&cantidad=<?php echo $article['article_cantidad']; ?>" class="icon-shopping-cart"></a></span></td>
                <td><span class="centrar"><a href="editar.php?id=<?php echo $article['article_id']; ?>" class="icon-pencil"></a></span></td>
                <td><input type="checkbox" name="selector[]" value="<?php echo $article["article_id"]; ?>" class="twelve columns checkbox"></td>
            </tr>
<?php } ?>
        </tbody>
    </table>

</form>

</div>
</div>

<!--<a href="index.php" id="logo" style="color: #000;">CMS</a>-->

<!--<a href="../index.php" style="color: #000;">&larr; Back</a>-->

</body>
</html>


<?php
}else{
    //display login
    if(isset($_POST['username'], $_POST['password'])){
        $username = $_POST['username'];
        $password = md5( $_POST['password']);
        if(empty($username) or empty($password)){
            $error = 'All fields are required!';
        } else{
            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

            $query->bindValue(1, $username);
            $query->bindValue(2, $password);

            $query->execute();

            $num = $query->rowCount();

            if($num == 1){
                //user entered correct details
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
            } else{
                //user entered false details
                $error = 'Incorrect details!';
            }
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
<body style="background-color: #f4f4f4; padding: 15px;">

        <a href="#" id="logo" style="color: #000;">DIMIO</a>


<div class="container">
    <div class="row" style="height: 500px; display: flex; justify-content: center; align-items: center;">
        <?php if(isset($error)){?>
            <small style="color: red;"><?php echo $error;?></small>
            
        <?php } ?>

            <span class="centrar" style="">

                <form class="twelve columns" action="index.php" method="post" autocomplete="">
                    <span class="twelve columns centrar">
                        <h1>Login</h1>
                    </span>
                    <span class="twelve columns centrar">
                        <input class="six columns" type="text" name="username" placeholder="Username"/>
                    </span>
                    <span class="twelve columns centrar">
                        <input class="six columns" type="password" name="password" placeholder="Password"/>
                    </span>
                    <span class="twelve columns centrar">
                    <input type="submit" value="Login"/>
                    </span>
                </form>

            </span>

    </div>
</div>

        <a href="../index.php" style="color: #000;">&larr; Back</a>


</body>

<script>
</script>

</html>

    <?php
}
?>