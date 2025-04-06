<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/lap-php-mywall/global.php");
require_once(__CLS_PATH . "cls_html.php");
require(__CTR_PATH . "ctr_wall.php"); 

$HTML = new cls_Html();
$ctr_Wall = new ctr_Wall(); 

// Evento click se activa al hacer click en el botón via POST
$post_successful = false;
if (isset($_POST['btn_save'])) {
    $post_successful = $ctr_Wall->btn_save_click();
    if ($post_successful) {
        // Redirigir para evitar reenvío del formulario y para añadir parámetro para scroll
        header('Location: ' . __SITE_PATH__ . '?posted=true');
        exit;
    }
}
?>

<div id="post_box">
    <h2 class="section-title">¿Qué quieres compartir hoy?</h2>
    
    <form id="frm_service" method="post" action="">
        <textarea name="txt_post" id="txt_post" rows="4" cols="6" class="textarea" 
                 placeholder="Escribe tu secreto (máximo 500 caracteres)" required maxlength="500"></textarea>
        <div class="button-container">
            <button type="submit" name="btn_save" id="btn_save" class="button">
                <span class="button-icon">📝</span> Publicar
            </button>
        </div>
    </form>
</div>

<div id="main_panel">
    <h2 class="panel-title">Publicaciones recientes</h2>

    <?php
        $row = $ctr_Wall->get_posts(); // Obtenemos el array de posts
        
        if (empty($row)) {
            echo "<div class='no-posts'>
                    <p>No hay publicaciones aún. ¡Sé el primero en publicar!</p>
                    <div class='empty-icon'>📝</div>
                  </div>";
        } else {
            $i = 1; // Contador de posts
            
            foreach($row as $value) {
                $post_id = htmlspecialchars($value[0], ENT_QUOTES, 'UTF-8');
                $post_content = htmlspecialchars($value[1], ENT_QUOTES, 'UTF-8');
                
                // Formatear fecha para mostrar de manera más amigable
                $post_date = new DateTime(htmlspecialchars($value[2], ENT_QUOTES, 'UTF-8'));
                $formatted_date = $post_date->format('d/m/Y H:i');
                
                // Aplicar nl2br para mantener saltos de línea en el contenido
                $post_content = nl2br($post_content);
                
                echo "<div class='post_block' id='post_block_{$post_id}'>
                        <span class='post_text' id='post_{$post_id}'>
                            <div class='published_date'>
                                <span>Publicado: {$formatted_date}</span>
                            </div>
                        </span>
                        <div id='content_post_{$i}'>
                            <div class='post_detail'>{$post_content}</div>
                        </div>
                      </div>";
                $i++;
            }
        }
    ?>
</div>

<?php if ($post_successful): ?>
<script>
    // Este código no se ejecutará debido al redirect implementado arriba,
    // pero se mantiene por si se quita el redirect en algún momento
    document.getElementById('frm_service').reset();
    document.getElementById('main_panel').scrollTop = document.getElementById('main_panel').scrollHeight;
</script>
<?php endif; ?>


