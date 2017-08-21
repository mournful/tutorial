<?php

namespace app\controllers;

use yii\web\Controller;

class JsonController extends Controller
{
    public function actionIndex()
    {
        $arr = \Yii::$app->randomArray->get(25);

        $jsonArr = json_encode($arr);
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/jsons/1.json', $jsonArr);
        echo 'all good';
    }
}