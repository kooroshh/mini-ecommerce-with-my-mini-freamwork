<?php


return new class{

    public function up()
    {
        $sql = "CREATE TABLE users(
                id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(191) NOT NULL,
                email VARCHAR(191) NOT NULL UNIQUE,
                image VARCHAR(191) NULL,
                password VARCHAR(191) NOT NULL,
                is_admin BOOLEAN NOT NULL DEFAULT 0,
                is_ban BOOLEAN NOT NULL DEFAULT 0,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE users";
        app()->db->pdo->exec($sql);
    }

};
