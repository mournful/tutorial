<?php

namespace app\modules\db_tutorial\controllers;

use app\modules\db_tutorial\models\Cars;
use app\modules\db_tutorial\models\CarsForm;
use app\modules\db_tutorial\models\Models;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CarsController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Cars::find()->orderBy('id'),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionUpdate($id)
    {
        $model = new CarsForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $data = Models::find()
                ->where(['id' => $id])
                ->one();
            $data->name = $model->name;
            $data->color_id = $model->color;
            $data->mark_id = $model->mark;
            $data->save();
            return $this->redirect('index', 301);
        } else {
            $data = Cars::find()
                ->where(['id' => $id])
                ->one();
            return $this->render('edit', ['model' => $model, 'data' => $data]);
        }
    }

    public function actionAdd()
    {
        $model = new CarsForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $data = new Models();
            $data->name = $model->name;
            $data->color_id = $model->color;
            $data->mark_id = $model->mark;
            $data->save();
            return $this->redirect('index', 301);
        } else {
            return $this->render('add', ['model' => $model]);
        }
    }

    public function actionDelete($id)
    {
        $model = Models::find()
            ->where(['id' => $id])
            ->one();
        $model->trash = true;
        return $this->redirect('index', 301);
    }

}