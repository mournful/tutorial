<?php

namespace app\modules\db_tutorial\models;

use yii\db\ActiveRecord;

class Marks extends ActiveRecord
{
    public static function tableName()
    {
        return '{{marks}}';
    }
}