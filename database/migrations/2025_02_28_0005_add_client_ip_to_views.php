<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE views
                ADD client_ip VARCHAR(100) NOT NULL";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE views DROP COLUMN client_ip";
        app()->db->pdo->exec($sql);
    }

};
