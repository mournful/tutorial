<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Cars';

?>

<div class="site-index">
    <h1>Cars</h1>

        <?php
        echo \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'name',
                'color',
                'mark',
                'create_at',
                'update_at',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'Действия',
                    'headerOptions' => ['width' => '80'],
                    'template' => '{update} {delete}{link}',
                    'urlCreator'=>function($action, $model){
                        return Url::to(['cars/'.$action,'id'=>$model->id]);
                    }
                ],
            ],
        ]);
        ?>
    <?= Html::a('Add new car!', ['cars/add'], ['class' => 'btn btn-success'] ); ?>
    <br>
    <?= Html::input('text', 'marker', '', ['id' => 'marker']); ?>
    <?= Html::button('Выделить марку машины', ['class' => 'btn btn-success', 'id' => 'markerButton'] ); ?>
    <?= Html::button('Очистить выделение', ['class' => 'btn btn-success', 'onClick' => 'jq_resetMarker()'] ); ?>


    <script src="/assets/f5561b5c/jquery.js"></script>
    <script>
        function resetMarker() {
            var elem = document.getElementsByTagName('tr');
            for(var i = 0; i<elem.length; i++) {
                if (elem[i].hasAttribute('style')) {
                    elem[i].removeAttribute('style');
                }
            }
        }
        function marker() {
            resetMarker();
            var elem = document.getElementsByTagName('tr');
            var markerText = document.getElementById('marker').value;
            for(var i = 0; i<elem.length; i++) {
                var el = elem[i];
                for(var j=0; j<el.childNodes.length; j++) {
                    var child = el.childNodes[j];
                    if (child.innerText == markerText) {
                        el.setAttribute('style', 'background-color:green');
                    }
                }
            }
        }

        function jq_resetMarker() {
            var elem1 = $('tr');
            elem1.each(function (index, element) {
                if ($(this).attr('style')) {
                    $(this).removeAttr('style');
                }
            });
        }
        function jq_marker() {
            jq_resetMarker();
            var elem = $('tr');
            var markerText = $('#marker').val();
            elem.each(function (index, element) {
                var selectedTr = $(this);
                $(this).children().each(function (index, element) {
                    if ($(this).text() == markerText) {
                        selectedTr.attr('style', 'background-color:green');
                    }
                })
            });
        }
    </script>
    <script>
        function logger(paramsArr) {
            var url = 'http://tutorial.loc/logger';
            var params1 = JSON.stringify(paramsArr)
            $.ajax({
                url: url,
                data: 'arr=' + params1
            });
        }

        $(document).click(function (eventObject) {
            var logArr = {
                'Событие': 'click',
                'Координата x': eventObject.pageX,
                'Координата y': eventObject.pageY
            };
            logger(logArr);
        });
        $('.btn').click(function (eventObject) {
            var logArr = {
                'Событие': 'нажатие кнопки',
                'Текст кнопки': $(this).text(),
                'ID кнопки': $(this).attr('id'),
                'Координата x': eventObject.pageX,
                'Координата y': eventObject.pageY
            };
            logger(logArr);
        });
        $('a').click(function (eventObject) {
            var logArr = {
                'Событие': 'нажатие ссылки',
                'Адрес ссылки': $(this).attr('href'),
                'Координата x': eventObject.pageX,
                'Координата y': eventObject.pageY
            };
            logger(logArr);
        });

    </script>

</div>
