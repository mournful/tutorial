<?php

namespace app\modules\db_tutorial\controllers;

use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        $tables = (new \yii\db\Query())
            ->select(['table_name'])
            ->from(['information_schema.cars'])
            ->where(['table_schema' => 'public'])
            ->all();

        return $this->render('index', ['cars' => $tables]);
    }
}