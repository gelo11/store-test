<?php

class Tovar
{
    protected $db;
    protected $table = 'tovar';
    
    public function __construct() {
        global $dbObject;
        $this->db = $dbObject;
    }
    
    public function getTovar($id) {
        try {
            $sql = "SELECT * FROM " . $this->table . " WHERE id=" . (int) $id;
            $stmt = $this->db->query($sql);
            $row = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return $row;
    }
    
    public function getFirstTovar() {
        try {
            $sql = "SELECT * FROM " . $this->table . " ORDER BY id ASC";
            $stmt = $this->db->query($sql);
            $row = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return $row;
    }
}