<?php
namespace app\modules\db_tutorial\controllers;

use yii\web\Controller;

class LoggerController extends Controller
{
    public function actionIndex($arr)
    {
        $arr = json_decode($arr, true);
        \Yii::$app->customLogger->add($arr);
    }
}