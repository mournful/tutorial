<?php

namespace app\controllers;

use app\models\Car;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;


class TutorialController extends Controller
{
    public $iCount;
    public $dirArr;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReq()
    {
        $address = '/media/share/tutorial.local/basic/vendor/behat';
        $this->dirArr = array();
        $this->req($address);
        return $this->render('req', ['address' => $address, 'dirArr' => $this->dirArr]);
    }

    private function req($address)
    {
        if (is_dir($address)) {
            $this->dirArr[] = $address;
            $res = opendir($address);
            while ($temp = readdir($res)) {
                $temp1 = $address . DIRECTORY_SEPARATOR . $temp;
                if (is_dir($temp1)  && $temp != '.' && $temp != '..') {
                    $this->req($temp1);
                }
            }
        }
    }

    public function actionBubble()
    {
        $randArr = Yii::$app->randomArray->get(50);

        /*Сортировка пузырьком*/
        $this->iCount = 0;

        $sortArr = $randArr;

        $count = count($sortArr) - 1;
        for ($i = $count; $i >= 0; $i--) {
            for ($j = 0; $j <= ($i - 1); $j++) {
                if ($sortArr[$j] > $sortArr[$j + 1]) {
                    $temp = $sortArr[$j];
                    $sortArr[$j] = $sortArr[$j + 1];
                    $sortArr[$j + 1] = $temp;
                }
                $this->iCount++;
            }
        }

        return $this->render('sort', ['randArr' => $randArr, 'sortArr' => $sortArr, 'iCount' => $this->iCount]);
    }

    public function actionShaker()
    {
        $randArr = Yii::$app->randomArray->get(50);

        //Сортировка перемешиванием
        $this->iCount = 0;

        $sortArr = $randArr;
        $l = 0;
        $r = count($sortArr) - 1;
        do {
            for ($i = $l; $i < $r; $i++) {
                if ($sortArr[$i] > $sortArr[$i + 1]) {
                    $temp = $sortArr[$i];
                    $sortArr[$i] = $sortArr[$i + 1];
                    $sortArr[$i + 1] = $temp;
                }
                $this->iCount++;
            }
            $r--;
            for ($i = $r; $i > $l; $i--) {
                if ($sortArr[$i] < $sortArr[$i - 1]) {
                    $temp = $sortArr[$i];
                    $sortArr[$i] = $sortArr[$i - 1];
                    $sortArr[$i - 1] = $temp;
                }
                $this->iCount++;
            }
            $l++;
        } while ($l < $r);


        return $this->render('sort', ['randArr' => $randArr, 'sortArr' => $sortArr, 'iCount' => $this->iCount]);
    }

    public function actionQuick()
    {
        $randArr = Yii::$app->randomArray->get(50);

        //Быстрая сортировка
        $this->iCount = 0;

        $sortArr = $this->quick($randArr);

        return $this->render('sort', ['randArr' => $randArr, 'sortArr' => $sortArr, 'iCount' => $this->iCount]);
    }

    private function quick(Array $arr)
    {
        $count = count($arr);
        if ($count <= 1) {
            return $arr;
        }

        $ind = $arr[0];
        $arrL = array();
        $arrR = array();

        for ($i = 1; $i < $count; $i++) {
            if ($arr[$i] <= $ind) {
                $arrL[] = $arr[$i];
            } else {
                $arrR[] = $arr[$i];
            }
            $this->iCount++;
        }

        $arrL = $this->quick($arrL);
        $arrR = $this->quick($arrR);

        return array_merge($arrL, array($ind), $arrR);
    }

    public function actionHash()
    {
        var_dump(Yii::$app->modules);
        die;

        /*$query = Car::find()->where('id > 0');
        $pages = new Pagination(['totalCount' => $query->count(),  'pageSize' => 1]);
        $cars = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('test', ['cars' => $cars,
                                            'pages' => $pages,]);*/

    }

}
