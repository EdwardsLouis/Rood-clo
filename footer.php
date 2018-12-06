<div class="" style="width: 100%; background-color: #000; margin-top: 5%; margin-bottom: 5px;">
        <div class="container">
            <div class="row">
                <span class="twelve columns menufoot" style="height: auto; padding: 25px 0;">
                    <span class="four columns">
                        <span style="color: #fff; display: block;"><a href="CMujer.php" style="font-size: 24px; font-family: k2dextrabold;">MUJER</a></span>
                        <span style="display: block;"><a href="CMujer.php#CMPlayeras">Playeras</a></span>
                        <span style="display: block;"><a href="CMujer.php#CMSudaderas">Sudaderas</a></span>
                    </span>
                    <span class="four columns">
                        <span style="color: #fff; display: block;"><a href="CHombre.php" style="font-size: 24px; font-family: k2dextrabold;">HOMBRE</a></span>
                        <span style="display: block;"><a href="CHombre.php#CHPlayeras">Playeras</a></span>
                        <span style="display: block;"><a href="CHombre.php#CHSudaderas">Sudaderas</a></span>
                    </span>
                    <span class="four columns">
                        <span style="color: #fff; display: block;"><a href="CAcc.php" style="font-size: 24px; font-family: k2dextrabold;">ACCESORIOS</a></span>
                        <span style="display: block;"><a href="CAcc.php#CAGorras">Gorras</a></span>
                        <span style="display: block;"><a href="CAcc.php#CAAnillos">Anillos</a></span>
                </span>
            </div>
        </div>
    </div>

    <div class="" style="width: 100%; background-color: #000; margin-top: 5px;">
        <div class="container">
            <div class="row">

                <span class="twelve columns centrar" style="margin-top: 25px;">
                    <a href="contacto.php" class="contacto" style="font-size: 18px; font-family: k2dextrabold;">Contacto</a>
                </span>

                <span class="twelve columns boletin" style="padding: 25px 0;">
    <form action="index.php" method="POST">
                    <span class="four columns">
                        <span style="font-size: 18px; font-family: k2dextrabold; color: #fff;">BOLETÍN DE NOTICIAS</span>
                    </span>

<?php 
if(isset($_POST['correo'])){
    $correo = $_POST['correo'];

    $query = $pdo->prepare('INSERT INTO boletin (boletin_correo) VALUES (?)');
            
    $query->bindValue(1, $correo);

    $query->execute();

    
}
?>

                    <span class="four columns">
                        <input type="email" name="correo" id="" placeholder="Email..." style="background-color: transparent; color: #fff; font-size: 18px; border: 1.5px solid #888;">
                    </span>
                    <span class="four columns">
                        <input type="submit" value="SUSCRIBIRSE" style="font-family: k2dextrabold; font-size: 18px;">
                    </span>
                </form>
                </span>
            </div>
        </div>
    </div>
