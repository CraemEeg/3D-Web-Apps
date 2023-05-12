<?php

class ProductModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function dbCreateTable()
    {
        // Check if the products table exists
        $result = $this->db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='products'");
        if (!$result->fetch()) {
            $this->db->exec("CREATE TABLE products (Id INTEGER PRIMARY KEY, name TEXT, description TEXT, image TEXT, btnCol TEXT, btnLink TEXT)");
        }

        // Check if the D3Products table exists
        $result = $this->db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='D3Products'");
        if (!$result->fetch()) {
            $this->db->exec("CREATE TABLE D3Products (Id INTEGER PRIMARY KEY, title TEXT, name TEXT, d3_model TEXT, text TEXT)");
        }

        return "D3Products and products tables are successfully created or already exist inside test1.db file";
    }


    public function dbInsertData()
    {
        $stmt = $this->db->prepare(
            "INSERT OR REPLACE INTO products (Id, name, description, image, btnCol, btnLink) 
            VALUES (:id, :name, :description, :image, :btnCol, :btnLink)"
        );

        $products = [
            [
                'id' => 1,
                'name' => 'Coke',
                'description' => "With its rich and delicious flavor, Coca-Cola has been a beloved classic for over 100 years. Whether you're enjoying it on its own, or using it as a mixer for your favorite cocktail, Coca-Cola is the perfect choice for any occasion.",
                'image' => './assets/CokeCan.png',
                'btnCol' => '#c41616',
                'btnLink' => './drink3D.php'
            ],
            [
                'id' => 2,
                'name' => 'Sprite',
                'description' => "With its clear, lemon-lime flavor, Sprite is the ultimate thirst quencher. Whether you're looking for a cool and refreshing drink on a hot summer day or a quick pick-me-up during a long day at work, Sprite is the perfect choice.",
                'image' => './assets/SpriteCan.png',
                'btnCol' => '#18981a',
                'btnLink' => './drink3D.php'
            ],
            [
                'id' => 3,
                'name' => 'Dr.Pepper',
                'description' => "With its unique blend of 23 flavors, Dr Pepper offers a one-of-a-kind taste experience that's sure to satisfy your thirst. Whether you're looking for a pick-me-up during a long day at work, or a refreshing drink to enjoy on a hot summer day, Dr Pepper is the perfect choice.",
                'image' => './assets/DrPepperCan.png',
                'btnCol' => '#681c29',
                'btnLink' => './drink3D.php'
            ]
        ];

        foreach ($products as $product) {
            $stmt->bindParam(':id', $product['id'], PDO::PARAM_INT);
            $stmt->bindParam(':name', $product['name'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $product['description'], PDO::PARAM_STR);
            $stmt->bindParam(':image', $product['image'], PDO::PARAM_STR);
            $stmt->bindParam(':btnCol', $product['btnCol'], PDO::PARAM_STR);
            $stmt->bindParam(':btnLink', $product['btnLink'], PDO::PARAM_STR);
            $stmt->execute();
        }


        $stmt2 = $this->db->prepare(
            "INSERT OR REPLACE INTO D3Products (Id, title, name, d3_model, text) 
            VALUES (:id, :title, :name, :d3_model, :text)"
        );

        $d3Products = [
            [
                'id' => 1,
                'title' => 'Coca-Cola Can',
                'name' => 'Coke',
                'd3_model' => './assets/cokeCanNew.x3d',
                'text' => 'The following Coke can was created & exported using blender. If Spin or Texture Change arent working please refresh the page and try again. '
            ],
            [
                'id' => 2,
                'title' => 'Sprite Cup',
                'name' => 'Sprite',
                'd3_model' => './assets/spriteCup.x3d',
                'text' => 'The following Sprite cup was created & exported using blender. If Spin or Texture Change arent working please refresh the page and try again. '
            ],
            [
                'id' => 3,
                'title' => 'Dr.Pepper',
                'name' => 'DRPEPPER',
                'd3_model' => './assets/DRPEPPER.x3d',
                'text' => 'The following Dr.Pepper bottle was created & exported using blender. If Spin or Texture Change arent working please refresh the page and try again. '
            ]
        ];

        foreach ($d3Products as $d3Product) {
            $stmt2->bindParam(':id', $d3Product['id'], PDO::PARAM_INT);
            $stmt2->bindParam(':title', $d3Product['title'], PDO::PARAM_STR);
            $stmt2->bindParam(':name', $d3Product['name'], PDO::PARAM_STR);
            $stmt2->bindParam(':d3_model', $d3Product['d3_model'], PDO::PARAM_STR);
            $stmt2->bindParam(':text', $d3Product['text'], PDO::PARAM_STR);
            $stmt2->execute();
        }

        return "3D model data inserted successfully inside test1.db";
    }



    public function getProducts()
    {



        $stmt = $this->db->query("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get3DProductById($productId)
    {
        $stmt = $this->db->query("SELECT * FROM D3Products WHERE id = :id");
        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && isset($row['d3_model'])) {
            // Convert BLOB data into a string
            $row['d3_model'] = $row['d3_model'];
        }

        return $row;
    }
}
