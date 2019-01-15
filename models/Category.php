<?php
/**
 * Created by PhpStorm.
 * User: OTZ_VAV
 * Date: 15.01.2019
 * Time: 11:25
 */

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
//        return parent::tableName(); // TODO: Change the autogenerated stub
        return 'category';
    }

    /**
     * @return array|ActiveRecord[]
     */
    public function getCategories() {
        return Category::find()->asArray()->all();
    }

}