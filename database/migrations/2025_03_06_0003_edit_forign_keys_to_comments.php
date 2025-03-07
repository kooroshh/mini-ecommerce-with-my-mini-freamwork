<?php


return new class{

    public function up()
    {
        $sql = "ALTER TABLE comments
                ADD CONSTRAINT fk_comments_products_id
                FOREIGN KEY (product_id) REFERENCES products(id)
                ON DELETE CASCADE;

                ALTER TABLE comments
                ADD CONSTRAINT fk_comments_users_id
                FOREIGN KEY (user_id) REFERENCES users(id)
                ON DELETE CASCADE;
                ";
        app()->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE comments
                DROP FOREIGN KEY fk_comments_products_id;


                ALTER TABLE comments
                DROP FOREIGN KEY fk_comments_users_id;

                ";
        app()->db->pdo->exec($sql);
    }

};
