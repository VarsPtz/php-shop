<?php

namespace app\models;
use yii\db\ActiveRecord;

class Translate extends ActiveRecord
{
    public static function tableName()
    {
        return 'translates';
    }
    public function getCategory()
    {
        return $this->hasOne(Translate::className(), ['cat_name' => 'code']);
    }
    public function getTransLine(string $code, $lang = 'ru'){
        return Translate::find()
            ->where(['code' => $code])
            ->andWhere(['language' => $lang])
            ->select(['string'])
            ->one()
            ->string;
    }
}