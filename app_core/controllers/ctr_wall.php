<?php
/* Archivo controlador que contiene los llamados a las acciones de la vista
   (ADD,EDIT,DELETE,SEARCH) */
  
require_once($_SERVER["DOCUMENT_ROOT"] . "/lap-php-mywall/global.php");
require_once(__CLS_PATH . "cls_wall.php");

class ctr_Wall {
    private cls_Wall $postdata;
    
    /**
     * Constructor del controlador
     */
    public function __construct() {
        $this->postdata = new cls_Wall();
    }
    
    /**
     * Obtiene todos los posts
     * @return array Array con los posts
     */
    public function get_posts(): array {
        return $this->postdata->get_posts();
    }
    
    /**
     * Maneja el evento de click en el botón de guardar
     * @return bool True si se guardó correctamente, false en caso contrario
     */
    public function btn_save_click(): bool {
        if (!isset($_POST['txt_post']) || empty($_POST['txt_post'])) {
            cls_Message::show_message("El post no puede estar vacío", "error", "");
            return false;
        }
        
        $postinfo = [htmlspecialchars($_POST['txt_post'], ENT_QUOTES, 'UTF-8')];
        
        if ($this->postdata->insert_post($postinfo)) {
            cls_Message::show_message("Post publicado correctamente", "success", "success_insert");
            return true;
        }
        
        return false;
    }
}
?>