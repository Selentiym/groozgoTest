<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.02.2018
 * Time: 15:45
 */

namespace app\components;


use yii\db\ActiveRecord;

/**
 * Class BaseModel
 * @package app\components
 * Base class for all models sued in the application.
 * Handles when a row with duplicating unique attributes is present in th DB
 */
abstract class BaseModel extends ActiveRecord {
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $crit = $this -> getUniqueAttributes();
                if (!empty($crit)) {
                    $dup = self::findOne($crit);
                } else {
                    $dup = null;
                }
                if ($dup instanceof ActiveRecord) {
                    $pks = array_keys($this -> getPrimaryKey(true));
                    if ($this -> getUpdateDuplicate($dup)) {
                        $dup -> setAttributes($this -> getAttributes(null,$pks),false);
                        $dup -> save();
                        $this -> addError(current($pks),'Updated duplicate instead of creating new row');
                    } else {
                        $this -> addError(current($pks),'No need to create a new row, continuing.');
                    }
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    protected function getUpdateDuplicate(self $dup){
        return true;
    }

    public function getUniqueAttributes(){
        $arr = $this -> listUniqueAttributes();
        if (!empty($arr)) {
            $rez = [];
            foreach ($arr as $attr) {
                $rez[$attr] = $this -> $attr;
            }
            return $rez;
        }
        return $this -> getPrimaryKey(true);
    }
    protected function listUniqueAttributes(){
        return [];
    }
    public function insert($runValidation = true, $attributes = null) {
        return parent::insert($runValidation, $attributes);
    }
}