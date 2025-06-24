<?php

 class Menu{
    private $conn;
    public function __construct($db){
        $this->conn = $db;

    }
    public function getMenuCompleto(){
        $sql = "SELECT c.nome AS categoria, s.nome AS subcategoria
        FROM categortia c
        JOIN subcategoria s ON s.id_categoria = c.id";

        $result = $this->conn->query($sql);
        if($result === false){
            die("Erro na Consulta SQL " . $this ->conn->error);
        }
        $menu = [];
        while($row = $result->fetch(PDO :: FETCH_ASSOC)){
            $categoria = $row['categoria'];
             $subcategoria = $row['subcategoria'];
              $menu[$categoria][] = $subcategoria;     
        }
        return $menu;
    }
}



?>