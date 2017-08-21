<?php

namespace app\modules\db_tutorial\controllers;

use yii\web\Controller;
use app\modules\db_tutorial\models\Cars;

class TablesController extends Controller
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

    public function actionChange($table)
    {
        $rows = Cars::find()->where('id > 0')->all();
        return $this->render('table', ['cars' => $rows]);
    }
}