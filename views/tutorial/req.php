<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Req';

?>
<div class="site-index">
    <p>Адрес:</p>
    <?= $address ?>
    <hr>
    <p>Массив папок:</p>
    <?php var_dump($dirArr); ?>

    <a href="<?= Url::to(['tutorial/index']) ?>">Назад</a>
</div>
