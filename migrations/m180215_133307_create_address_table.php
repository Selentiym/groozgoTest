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
