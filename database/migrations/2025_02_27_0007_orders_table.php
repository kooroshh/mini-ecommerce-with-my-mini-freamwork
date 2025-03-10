<?php


return new class{

    public function up()
    {
        $sql = "CREATE TABLE orders(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                user_id INT NOT NULL,
                price BIGINT NOT NULL,
                status ENUM('paid', 'paying', 'cancelled') NOT NULL DEFAULT 'paying',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                close_at TIMESTAMP NULL DEFAULT NULL
        );";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE orders";
        app()->db->pdo->exec($sql);
    }

};
