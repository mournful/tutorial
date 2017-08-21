<?php

namespace app\modules\db_tutorial\models;

use yii\db\ActiveRecord;

class Cars extends ActiveRecord
{
    public static function tableName()
    {
        return '{{cars}}';
    }
}