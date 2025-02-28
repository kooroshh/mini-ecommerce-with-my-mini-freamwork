<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE users
                ALTER COLUMN image SET DEFAULT 'user.webp';";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE users
                ALTER COLUMN image DROP DEFAULT;";
        app()->db->pdo->exec($sql);
    }

};
