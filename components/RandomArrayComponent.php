<?php

namespace app\components;

use yii\base\Component;

class RandomArrayComponent extends Component
{

    public function get($arrSize, $arr = [])
    {
        $arr[] = mt_rand(1, 100);
        if ($arrSize <= 1) {
            return $arr;
        }
        return $this->get($arrSize - 1, $arr);
    }

    public function add($b, $a)
    {

        return $a+$b;
    }
}