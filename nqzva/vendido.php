<?php

session_start();
include_once('../includes/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendido</title>
        <!--  HOJAS DE ESTILO EN CASCADA  -->
        <link rel="stylesheet" href="../assets/normalize.css">
    <link rel="stylesheet" href="../assets/skeleton.css">
    <link rel="stylesheet" href="../assets/style.css">
    <!-- ICONOS -->
    <link rel="stylesheet" href="../assets/icomoon/style.css">
    <script src="../assets/js/jquery-3.3.1.js"></script>

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
<body style="background-color: #f4f4f4; padding-bottom: 50px;">
    
    <div class="container">
        <div class="row centrar" style="margin-top: 30px;">
            <h1>Vendido</h1>
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


<?php 

$query = $pdo->query("SELECT V.*, A.* FROM vendido V INNER JOIN articles A ON V.vendido_articulo = A.article_id ORDER BY vendido_id DESC");

?>        
    <div class="container">
        <div class="row">
            <form action="funciones.php" method="post">
            <table class="u-full-width" id="tabla">
                <thead>
                    <tr>
                        <th>Articulo</th>
                        <th>Cantidad Actual</th>
                        <th>Precio del Articulo</th>
                        <th>Cantidad Vendido</th>
                        <th>Precio Total</th>
                        <th><input type="submit" value="Eliminar" class="twelve columns eliminar"></th>
                        <!--<th><input type="checkbox" name="" id="checkboxall"></th>-->
                    </tr>
                </thead>
                <tbody>
                <?php foreach($query as $vendido){ ?>
                    <tr class="<?php echo $vendido["article_categoria"]; ?> <?php echo $vendido["article_genero"]; ?>">
                        <td style="display: none;"><input type="hidden" name="id" value="<?php echo $vendido["article_id"]; ?>"></td>
                        <td style="display: none;"><input type="hidden" name="cantidadActual" value="<?php echo $vendido["article_cantidad"]; ?>"></td>
                        <td style="display: none;"><input type="hidden" name="vendido" value="<?php echo $vendido["vendido_cantidad"]; ?>"></td>
                        <td><?php echo $vendido["article_title"]; ?></td>
                        <td><?php echo $vendido["article_cantidad"]; ?></td>
                        <td>$<?php echo $vendido["article_precio"]; ?></td>
                        <td><?php echo $vendido["vendido_cantidad"]; ?></td>
                        <td>$<?php echo $vendido["article_precio"]*$vendido["vendido_cantidad"]; ?></td>
                        <td><input type="checkbox" name="eliminarVendido[]" value="<?php echo $vendido["vendido_id"]; ?>" class="twelve columns checkbox"></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <a href="index.php" style="color: #000; font-size: 20px;">&larr; REGRESAR</a>
        </div>
    </div>

</body>
</html>