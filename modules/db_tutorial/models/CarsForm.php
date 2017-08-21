<?php
namespace app\modules\db_tutorial\models;

use yii\base\Model;

class CarsForm extends Model
{
    public $name;
    public $color;
    public $mark;

    public function rules()
    {
       return [
           [[ 'name', 'color', 'mark' ], 'required' ],
       ];
    }
}