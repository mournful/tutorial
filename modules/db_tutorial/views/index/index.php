<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Tables';

?>

<div class="site-index">
    <h1>Список таблиц</h1>
    <ul>
        <?php foreach ($tables as $table) : ?>
            <li><a href="<?= Url::to([$table['table_name'] . '/index']) ?>"><?= $table['table_name'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
