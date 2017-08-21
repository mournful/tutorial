<?php

namespace app\modules\db_tutorial\models;

use yii\db\ActiveRecord;

class Color extends ActiveRecord
{
    public static function tableName()
    {
        return '{{colors}}';
    }
}