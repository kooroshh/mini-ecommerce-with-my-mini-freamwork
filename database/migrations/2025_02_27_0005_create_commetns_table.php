<?php


return new class{

    public function up()
    {
        $sql = "CREATE TABLE comments(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                product_id INT NOT NULL,
                user_id INT NOT NULL,
                body TEXT NOT NULL,
                is_active BOOLEAN NOT NULL DEFAULT 0,
                FOREIGN KEY (product_id) REFERENCES products(id),
                FOREIGN KEY (user_id) REFERENCES users(id)
        );";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE comments";
        app()->db->pdo->exec($sql);
    }

};
