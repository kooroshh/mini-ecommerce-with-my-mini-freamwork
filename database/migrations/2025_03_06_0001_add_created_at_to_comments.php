<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE comments
                ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE comments
                DROP COLUMN created_at;";
        app()->db->pdo->exec($sql);
    }

};
