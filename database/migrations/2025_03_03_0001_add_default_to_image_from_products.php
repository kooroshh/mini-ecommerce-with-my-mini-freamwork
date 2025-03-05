<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE products
                ALTER COLUMN image SET DEFAULT 'product.webp';";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE products
                ALTER COLUMN image DROP DEFAULT;";
        app()->db->pdo->exec($sql);
    }

};
