<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Tables';
?>

<div class="site-index">
    <h1>Список таблиц</h1>
    <ul>
        <?php foreach ($tables as $table) : ?>
            <li><a href=""><?= $table['name'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
