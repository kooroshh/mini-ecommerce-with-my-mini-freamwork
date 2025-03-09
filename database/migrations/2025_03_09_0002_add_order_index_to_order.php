<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE orders
                ADD COLUMN order_index VARCHAR(20) NOT NULL UNIQUE";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE orders
                DROP COLUMN order_index;";
        app()->db->pdo->exec($sql);
    }

};
