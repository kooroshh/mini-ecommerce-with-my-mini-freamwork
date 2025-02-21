<?php

use Main\Core\Application;


return new class{

    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );";
        Application::$app->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS users";
        Application::$app->db->pdo->exec($sql);
    }

};
