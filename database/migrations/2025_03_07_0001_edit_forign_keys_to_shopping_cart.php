<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE shopping_cart
                ADD CONSTRAINT fk_shopping_cart_products_id
                FOREIGN KEY (product_id) REFERENCES products(id)
                ON DELETE CASCADE;

                ALTER TABLE shopping_cart
                ADD CONSTRAINT fk_shopping_cart_users_id
                FOREIGN KEY (user_id) REFERENCES users(id)
                ON DELETE CASCADE;
                ";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE shopping_cart
                DROP FOREIGN KEY fk_shopping_cart_products_id;


                ALTER TABLE shopping_cart
                DROP FOREIGN KEY fk_shopping_cart_users_id;

                ";
        app()->db->pdo->exec($sql);
    }

};
