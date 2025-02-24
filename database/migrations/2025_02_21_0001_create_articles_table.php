<?php

use Main\Core\Application;


return new class{

    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS articles(
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            body TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS articles";
        app()->db->pdo->exec($sql);
    }

};
