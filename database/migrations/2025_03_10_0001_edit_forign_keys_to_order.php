<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE orders
                ADD CONSTRAINT fk_orders_users_id
                FOREIGN KEY (user_id) REFERENCES users(id)
                ON DELETE CASCADE;
                ";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE orders
                DROP FOREIGN KEY fk_orders_users_id;
                ";
        app()->db->pdo->exec($sql);
    }

};
