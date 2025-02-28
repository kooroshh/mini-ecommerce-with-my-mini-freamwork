<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE products MODIFY COLUMN price DECIMAL(10,2) NOT NULL;";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE products MODIFY COLUMN price BIGINT NOT NULL";
        app()->db->pdo->exec($sql);
    }

};
