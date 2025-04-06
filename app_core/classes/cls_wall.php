<?php
require_once(__CLS_PATH . "cls_mysql.php");

class cls_Wall {
    private cls_Mysql $data_provide;
    
    public function __construct() {
        $this->data_provide = new cls_Mysql();
    }
    
    /**
     * Obtiene todos los posts ordenados por ID descendente
     * @return array Array con los posts
     */
    public function get_posts(): array {
        $result = $this->data_provide->sql_execute(
            "SELECT tbl_posts.id, tbl_posts.post, tbl_posts.date 
             FROM tbl_posts 
             ORDER BY id DESC"
        );
        
        if ($result === false) {
            return [];
        }
        
        return $this->data_provide->sql_get_rows($result);
    }
    
    /**
     * Inserta un nuevo post en la base de datos
     * @param array $postdata Datos del post a insertar
     * @return bool True si se insertó correctamente, false en caso contrario
     */
    public function insert_post(array $postdata): bool {
        if (empty($postdata[0])) {
            return false;
        }
        
        // Usando consulta preparada para mayor seguridad
        $result = $this->data_provide->sql_execute_prepared(
            "INSERT INTO tbl_posts (post, date) VALUES (?, ?)",
            "ss",
            [$postdata[0], date('Y-m-d H:i:s')]
        );
        
        return $result !== false;
    }
}
?>