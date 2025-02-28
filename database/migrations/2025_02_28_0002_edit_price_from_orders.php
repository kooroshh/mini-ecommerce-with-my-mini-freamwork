<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE orders MODIFY COLUMN price DECIMAL(10,2) NOT NULL;";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE orders MODIFY COLUMN price BIGINT NOT NULL";
        app()->db->pdo->exec($sql);
    }

};
