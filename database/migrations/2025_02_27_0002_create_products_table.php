<?php


return new class{

    public function up()
    {
        $sql = "CREATE TABLE products(
                id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                slug VARCHAR(191) NOT NULL UNIQUE,
                name VARCHAR(255) NOT NULL,
                image VARCHAR(255) NULL,
                description TEXT NOT NULL,
                price BIGINT NOT NULL,
                count INT NOT NULL DEFAULT 0,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE products";
        app()->db->pdo->exec($sql);
    }

};
