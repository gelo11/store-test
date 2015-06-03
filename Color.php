<?php

class Color
{   
    protected $db;
    protected $table = 'color';
    protected $table_throw = 'color_table';
    
    public function __construct() {
        global $dbObject;
        $this->db = $dbObject;
    }
    
    public function getColorTovar($tovar_id) {
        try {
            $sql = "SELECT C.* FROM " . $this->table . " C ";
            $sql .= "INNER JOIN " . $this->table_throw . " T ON T.id_color = C.id ";
            $sql .= "WHERE T.id_tovar=" . (int) $tovar_id;
            $stmt = $this->db->query($sql);
            $rows = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return $rows;
    }
    
}