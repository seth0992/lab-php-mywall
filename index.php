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
        <?php
            echo $HTML->html_js_header(__JS_PATH . "jquery-3.6.0.min.js");
            echo $HTML->html_js_header(__JS_PATH . "jquery-ui.min.js");
            echo $HTML->html_js_header(__JS_PATH . "functions.js");
            echo $HTML->html_css_header(__CSS_PATH . "style.css", "screen");
        ?>
        <title>My Wall</title>
    </head>
    
    <body id="main_page">
        <div id="main_box">
            <?php
                include_once(__VWS_PATH . "wall.php");
            ?>
        </div>
    </body>
</html>