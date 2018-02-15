<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180215_132957_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'born' => $this->date(),
            'gender' => $this->boolean(),
            'phone' => $this->string(17),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
