<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE orders_products
                ADD CONSTRAINT fk_orders_products_products_id
                FOREIGN KEY (product_id) REFERENCES products(id)
                ON DELETE CASCADE;

                ALTER TABLE orders_products
                ADD CONSTRAINT fk_orders_products_orders_id
                FOREIGN KEY (order_id) REFERENCES orders(id)
                ON DELETE CASCADE;
                ";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE orders_products
                DROP FOREIGN KEY fk_orders_products_products_id;


                ALTER TABLE orders_products
                DROP FOREIGN KEY fk_orders_products_orders_id;

                ";
        app()->db->pdo->exec($sql);
    }

};
