<?php


return new class{

    public function up()
    {
        $sql = "CREATE TABLE categories(
                id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(191) NOT NULL UNIQUE
        );";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE categories";
        app()->db->pdo->exec($sql);
    }

};
