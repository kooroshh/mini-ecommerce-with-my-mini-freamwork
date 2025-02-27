<?php


return new class{

    public function up()
    {
        $sql = "CREATE TABLE products_categories(
                product_id INT NOT NULL,
                category_id INT NOT NULL,
                PRIMARY KEY(product_id, category_id),
                FOREIGN KEY (product_id) REFERENCES products(id),
                FOREIGN KEY (category_id) REFERENCES categories(id)
        );";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE products_categories";
        app()->db->pdo->exec($sql);
    }

};
