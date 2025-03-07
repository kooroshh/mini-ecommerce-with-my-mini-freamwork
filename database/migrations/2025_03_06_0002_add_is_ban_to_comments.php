<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE comments
                ADD COLUMN is_ban BOOLEAN DEFAULT 0";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE comments
                DROP COLUMN is_ban;";
        app()->db->pdo->exec($sql);
    }

};
