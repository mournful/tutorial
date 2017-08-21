<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';


?>
<div class="site-index">
    <a href="<?= Url::to(['tutorial/req']) ?>">Рекурсия</a>
    <hr>
    <a href="<?= Url::to(['tutorial/bubble']) ?>">Сортировка пузырьком</a>
    <a href="<?= Url::to(['tutorial/shaker']) ?>">Сортировка перемешиванием</a>
    <a href="<?= Url::to(['tutorial/quick']) ?>">Быстрая сортировка</a>
    <hr>
    <a href="<?= Url::to(['tutorial/hash']) ?>">Поиск по хэш-таблице</a>
</div>
