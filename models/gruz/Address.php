<?php

namespace app\models\gruz;

use app\components\BaseModel;
use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $id_user
 * @property string $name
 * @property string $address
 *
 * @property User $user
 */
class Address extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'name', 'address'], 'required'],
            [['id_user'], 'integer'],
            [['address'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'name' => 'Name',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
