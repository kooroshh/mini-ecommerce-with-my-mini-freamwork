<?php

use Main\Core\Application;


return new class{

    public function up()
    {
        $sql = "ALTER TABLE users
                ADD password varchar(255) NOT NULL;";
        Application::$app->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE users
                DROP COLUMN password;";
        Application::$app->db->pdo->exec($sql);
    }

};
