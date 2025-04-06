<?php 
require_once(__CLS_PATH . "cls_mysql.php");

class cls_wall{

    private cls_Mysql $data_provide;

    public function __construct(){
        $this->data_provide = new cls_Mysql();
    }
    
    //Obtine todos los post ordenados por ID 
    public function get_posts():array{
        $result = $this->data_provide->sql_execute(
            "SELECT tbl_posts.id, tbl_posts.post, tbl_posts.date FROM tbl_posts ORDER BY id DESC"
        );


        if($result === false){
            return [];
        }

        return $this->data_provide->sql_get_rows($result);
    }

    //Insertar un nuevo post en la base de datos
    public function insert_post(array $postdata):bool{

        if(empty($postdata[0])){
            return false;
        }

        $result = $this->data_provide->sql_execute_prepared(
            "INSERT INTO tbl_posts (post, date) VALUES (?,?)",
            "ss",
            [$postdata[0], date('Y-m-d H:i:s')]
        );

        return $result !== false;
    }



}


?>