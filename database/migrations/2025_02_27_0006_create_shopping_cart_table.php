<?php


return new class{

    public function up()
    {
        $sql = "CREATE TABLE shopping_cart(
                product_id INT NOT NULL,
                user_id INT NOT NULL,
                PRIMARY KEY(product_id, user_id)
        );";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE shopping_cart";
        app()->db->pdo->exec($sql);
    }

};
