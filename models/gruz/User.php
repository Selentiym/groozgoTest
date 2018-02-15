<?php

namespace app\models\gruz;

use Yii;
use yii\db\Expression;

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
    public $bornUpdate;
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
            [['bornUpdate'], 'safe'],
            [['gender'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 17],
        ];
    }

    public function afterFind() {
        $this -> bornUpdate = date('d.m.Y',strtotime($this -> born.' 00:00:00'));
        parent::init(); // TODO: Change the autogenerated stub
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
            'bornUpdate' => 'Дата рождения',
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

    public function beforeValidate() {
        if ($this -> bornUpdate) {
            if (preg_match('/(\d{2})\.(\d{2})\.(\d{4})/', $this -> bornUpdate, $matches)) {
                $this -> born = $matches[3].'-'.$matches[2].'-'.$matches[1];
            } else {
                $this -> addError('born', 'Неправильный формат даты');
            }
        }
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }
}
