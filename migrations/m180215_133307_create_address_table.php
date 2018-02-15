<?php

use yii\db\Migration;

/**
 * Handles the creation of table `address`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m180215_133307_create_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'address' => $this->text()->notNull(),
        ]);

        // creates index for column `id_user`
        $this->createIndex(
            'idx-address-id_user',
            'address',
            'id_user'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-address-id_user',
            'address',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );

        $data = [
            [
                'id_user' => 1,
                'name' => 'Дом',
                'address' => 'Москва,  спальный район'
            ],[
                'id_user' => 1,
                'name' => 'Работа',
                'address' => 'Москва, центр'
            ],[
                'id_user' => 2,
                'name' => 'Дом',
                'address' => 'Химки'
            ],[
                'id_user' => 3,
                'name' => 'Дом',
                'address' => 'Московская область, Иваново',
            ]
        ];
        foreach ($data as $arr) {
            $this -> insert('address', $arr);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-address-id_user',
            'address'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            'idx-address-id_user',
            'address'
        );

        $this->dropTable('address');
    }
}
