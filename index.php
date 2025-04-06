<?php
    require_once("global.php");
    require_once(__CLS_PATH . "cls_html.php");
    
    $HTML = new cls_Html();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="MyWall - Una plataforma para compartir tus pensamientos">
        <?php
            // Incluir jQuery y jQuery UI
            echo $HTML->html_js_header("https://code.jquery.com/jquery-3.6.0.min.js");
            echo $HTML->html_js_header("https://code.jquery.com/ui/1.13.2/jquery-ui.min.js");
            
            // Incluir archivo de funciones JS propio
            echo $HTML->html_js_header(__JS_PATH . "functions.js");
            
            // Incluir CSS
            echo $HTML->html_css_header(__CSS_PATH . "style.css", "screen");
        ?>
        <title>My Wall - Comparte tus pensamientos</title>
        <!-- Favicon -->
        <link rel="icon" href="<?php echo __IMG_PATH; ?>favicon.ico" type="image/x-icon">
    </head>
    
    <body id="main_page">
        <div id="main_box">
            <header>
                <h1 class="site-title">My Wall</h1>
                <p class="site-description">Comparte tus pensamientos con el mundo</p>
            </header>
            
            <?php
                include_once(__VWS_PATH . "wall.php");
            ?>
            
            <footer>
                <p>My Wall &copy; <?php echo date('Y'); ?> - Todos los derechos reservados</p>
            </footer>
        </div>
    </body>
</html>