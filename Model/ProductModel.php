<?php

class ProductModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getProducts()
    {
        $stmt = $this->db->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get3DProductById($productId)
    {
        $stmt = $this->db->prepare("SELECT * FROM 3DProducts WHERE id = :id");
        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && isset($row['3D'])) {
            // Convert BLOB data into a string
            $row['3D'] = $row['3D'];
        }

        return $row;
    }
}
