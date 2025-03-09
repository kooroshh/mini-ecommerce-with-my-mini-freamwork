<?php


return new class{

    public function up()
    {
        $sql = "CREATE TABLE orders_products(
                product_id INT NOT NULL,
                order_id INT NOT NULL,
                PRIMARY KEY(product_id, order_id)
        );";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE orders_products";
        app()->db->pdo->exec($sql);
    }

};
