<?php

use yii\db\Migration;

class m170329_082412_init_message_boards_mechanism extends Migration
{
    public function up()
    {
        $this->createTable('message_boards',[
           'id' => $this->primaryKey(),
           'user_id' => $this->integer()->notNull(),
            'client_id' => $this->integer()->null(),
            'title' => $this->string(255)->notNull(),
            'main_message' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

    }

    public function down()
    {
        $this->dropTable('message_boards');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
