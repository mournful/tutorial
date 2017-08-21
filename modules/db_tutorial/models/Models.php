<?php

namespace app\modules\db_tutorial\models;

use yii\db\ActiveRecord;

class Models extends ActiveRecord
{
    public static function tableName()
    {
        return '{{models}}';
    }
}