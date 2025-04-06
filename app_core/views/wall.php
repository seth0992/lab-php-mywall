<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/lab-php-mywall/global.php");
require_once(__CLS_PATH . "cls_html.php");
require(__CTR_PATH . "ctr_wall.php"); // Agregamos la referencia al controlador respectivo

$HTML = new cls_Html();
$ctr_Wall = new ctr_Wall(); // variable del Controlador

// Evento click se activa al hacer click en el botón via POST
$post_successful = false;
if (isset($_POST['btn_save'])) {
    $post_successful = $ctr_Wall->btn_save_click();
}
?>

<div id="post_box">
    <form id="frm_service" method="post" action="">
        <textarea name="txt_post" id="txt_post" rows="4" cols="6" class="textarea" 
                 placeholder="Escribe tu secreto!" required></textarea>
        <button type="submit" name="btn_save" id="btn_save" class="button">Publicar</button>
    </form>
</div>

<div id="main_panel">
<?php
    $row = $ctr_Wall->get_posts(); // Obtenemos el array de posts
    
    if (empty($row)) {
        echo "<p class='no-posts'>No hay publicaciones aún. ¡Sé el primero en publicar!</p>";
    } else {
        $i = 1; // Contador de posts
        
        foreach($row as $value) {
            $post_id = htmlspecialchars($value[0], ENT_QUOTES, 'UTF-8');
            $post_content = htmlspecialchars($value[1], ENT_QUOTES, 'UTF-8');
            $post_date = htmlspecialchars($value[2], ENT_QUOTES, 'UTF-8');
            
            echo "<div class='post_block'>
                    <span class='post_text' id='post_{$post_id}'>
                        <div class='published_date'>
                            <span>Publicado:&nbsp;{$post_date}</span>
                        </div>
                    </span>
                    <div id='content_post_{$i}'>
                        <div class='post_detail'>{$post_content}</div><br/>
                    </div>
                </div>";
            $i++;
        }
    }
?>
</div>

<?php if ($post_successful): ?>
<script>
    // Limpiar el formulario después de un envío exitoso
    document.getElementById('frm_service').reset();
</script>
<?php endif; ?>