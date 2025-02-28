<?php


return new class{

    public function up()
    {
        $sql = "CREATE TABLE views(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                view_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP        
        );";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE views";
        app()->db->pdo->exec($sql);
    }

};
