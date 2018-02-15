<?php

namespace app\models\gruz;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $born
 * @property int $gender
 * @property string $phone
 *
 * @property Address[] $addresses
 */
class User extends \app\components\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['born'], 'safe'],
            [['gender'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 17],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'born' => 'Дата рождения',
            'gender' => 'Пол',
            'phone' => 'Номер телефона',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['id_user' => 'id']);
    }

    public function getFullName() {
        return $this -> name.' '.$this -> surname;
    }
}
