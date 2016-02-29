<?php

use yii\helpers\Html;


$this->title = '发送消息';
$this->params['breadcrumbs'][] = ['label' => '发送消息', 'url' => ['index']];

?>
<div class="company-create">


    <?= $this->render('_form', [
        'model' => $model,
        'package'=>$package,
    ]) ?>

</div>
