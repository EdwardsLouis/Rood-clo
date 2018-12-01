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



    </script>

</head>

<body style="background-color: #f4f4f4;">


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
<div class="row">
    <a href="add.php" class="four columns centrar opcionesIndex" style="height: 65px; background-color: #72B2FF;">
        <p class="icon-plus" style="color: #fff; font-size: 48px; margin-bottom: 0;"></p>
    </a>
    <a href="boletin.php" class="four columns centrar opcionesIndex" style="height: 65px; background-color: #f7d151;">
        <p class="icon-email" style="color: #fff; font-size: 32px; margin-bottom: 0;"></p>
        <p class="icon-archive" style="color: #fff; font-size: 32px; margin-bottom: 0;"></p>
    </a>
    <a href="logout.php" class="four columns centrar opcionesIndex" style="height: 65px; background-color: #525252;">
        <p class="icon-log-out" style="color: #fff; font-size: 32px; margin-bottom: 0;"></p>
    </a>
</div>
</div>

<div class="container">
<div class="row">

<?php 
if (isset($_POST['buscar'])){
    // Tomamos el valor ingresado
    $buscar = mysqli_real_escape_string($pdo, $_POST['articulo']);

    // Si está vacío, lo informamos, sino realizamos la búsqueda
    if (empty($buscar)){
        echo "No se ha ingresado una cadena a buscar";
    }else{
        $sql = "SELECT * FROM articles WHERE article_title like '%$buscar%' ORDER BY article_id DESC";
        $result = mysqli_query($pdo, $sql);
        if ($result === false){
            echo mysqli_error($pdo);
        }else{
            $total = mysqli_num_rows($result);
            // Imprimimos los resultados
            if ($article = mysqli_fetch_array($result)){
                echo "Resultados para: <b>$buscar</b>";
                do {
                ?>
                    <table class="u-full-width">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Disponible</th>
                <th>Talla</th>
                <th><button class="twelve columns" name="agregar[]">Agregar Pz.</button></th>
                <th><button class="twelve columns" name="vendido[]">Vendidas</button></th>
                <th>Editar</th>
                <th><input type="submit" value="Eliminar" class="twelve columns eliminar"></th>
                <th><input type="checkbox" name="" id="checkboxall"></th>
            </tr>
        </thead>
        <tbody>
			<tr>
                <td><?php echo $article["article_categoria"]; ?></td>
                <td><?php echo $article["article_title"]; ?></td>
                <td><?php echo $article["article_cantidad"]; ?></td>
                <td><?php echo $article["article_tallas"]; ?></td>
                <td><input type="number" name="" id="" class="twelve columns"></td>
                <td><input type="number" name="" id="" class="twelve columns"></td>
                <td><span class="centrar"><a href="editar.php?id=<?php echo $article['article_id']; ?>" class="icon-pencil"></a></span></td>
                <td><input type="checkbox" name="selector[]" value="<?php echo $article["article_id"]; ?>" class="twelve columns checkbox"></td>
            </tr>
			</tbody>
    </table>
                <?php
                }while ($article = mysqli_fetch_array($result));
                echo "<p>Resultados: $total</p>";
            }else{
                // En caso de no encontrar resultados
                echo "No se encontraron resultados para: $buscar";
            }
        }
    }
}

?>

    <form action="index.php" method="POST">
        <input type="text" name="articulo" id="" class="eight columns" placeholder="Buscar...">
        <input type="submit" value="buscar" value="Buscar" class="four columns">
    </form>

</div>
</div>

<div class="container">
<div class="row">
<?php 


$query = $pdo->query("SELECT article_id, article_categoria, article_title, article_cantidad, article_tallas FROM articles ORDER BY article_id DESC");


?>        
<form action="funciones.php" method="post">
    <table class="u-full-width">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Disponible</th>
                <th>Talla</th>
                <th><button class="twelve columns" name="agregar[]">Agregar Pz.</button></th>
                <th><button class="twelve columns" name="vendido[]">Vendidas</button></th>
                <th>Editar</th>
                <th><input type="submit" value="Eliminar" class="twelve columns eliminar"></th>
                <th><input type="checkbox" name="" id="checkboxall"></th>
            </tr>
        </thead>
        <tbody>

<?php 

foreach($query as $article){

 ?>

            <tr>
                <td><?php echo $article["article_categoria"]; ?></td>
                <td><?php echo $article["article_title"]; ?></td>
                <td><?php echo $article["article_cantidad"]; ?></td>
                <td><?php echo $article["article_tallas"]; ?></td>
                <td><input type="number" name="" id="" class="twelve columns"></td>
                <td><input type="number" name="" id="" class="twelve columns"></td>
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