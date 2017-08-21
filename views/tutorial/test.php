<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Req';

/*var_dump($cars);*/

?>
<div class="site-index">

    <?php foreach ($cars as $car) {
        echo $car->name;
        echo '<br>';
    }

    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>

</div>
