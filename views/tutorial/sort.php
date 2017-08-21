<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Sort';

?>
<div class="site-index">
    <p>Сгенерирован массив:</p>
    <?php var_dump($randArr); ?>
    <hr>
    <p>Отсортированный массив:</p>
    <?php var_dump($sortArr); ?>
    <hr>
    <p>Колличество произведенных операций: <?= $iCount ?></p>


    <a href="<?= Url::to(['tutorial/index']) ?>">Назад</a>
</div>
