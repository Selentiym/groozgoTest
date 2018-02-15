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
        $data = [
            [
                'name' => 'Иван',
                'surname' => 'Иванов',
                'born' => '1990-01-01',
                'gender' => 1,
                'phone' => 79999999999,
            ],[
                'name' => 'Петр',
                'surname' => 'Петров',
                'born' => '1980-11-11',
                'gender' => 1,
                'phone' => 79999999998,
            ],[
                'name' => 'Иванна',
                'surname' => 'Иванова',
                'born' => '1999-11-11',
                'gender' => 0,
                'phone' => 79999999997,
            ]
        ];
        foreach ($data as $arr) {
            $this -> insert('user', $arr);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
