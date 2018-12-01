<?php 

include_once('../includes/connection.php');

if(isset($_POST['modificar'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);
    $img = $_POST['img'];
    $categoria = $_POST['categoria'];
    $tallas = $_POST['tallas'];
    $precio = $_POST['precio'];
    $genero = $_POST['genero'];
    $cantidad = $_POST['cantidad'];
    $sku = $_POST['sku'];
    
    $con = "UPDATE 'articles' 
            SET 'article_title'='$title',
                    'article_content'='$content',
                    'article_img'='$img',
                    'article_categoria'='$categoria',
                    'article_tallas'='$tallas',
                    'article_precio'='$precio',
                    'article_genero'='$genero',
                    'article_cantidad'='$cantidad',
                    'article_sku'='$sku
            WHERE 'articles'.'id' = $id";
    
}

/*if(isset($_POST['title'])){
    
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);
    $img = $_POST['img'];
    $categoria = $_POST['categoria'];
    $tallas = $_POST['tallas'];
    $precio = $_POST['precio'];
    $genero = $_POST['genero'];
    $cantidad = $_POST['cantidad'];
    $sku = $_POST['sku'];
        
    
        if(empty($title)){
            $error = 'All fields are required!';
        } else{
            $query = $pdo->prepare("UPDATE 'articles' 
            SET 'article_title'='$title',
                'article_content'='$content',
                'article_img'='$img',
                'article_categoria'='$categoria',
                'article_tallas'='$tallas',
                'article_precio'='$precio',
                'article_genero'='$genero',
                'article_cantidad'='$cantidad',
                'article_sku'='$sku
            WHERE 'article_id' = ?");    
    
            $query->execute();
        }
    }*/

?>
