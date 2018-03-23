<?php

use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $model common\models\MessageBoards */

$this->title = 'Редактировать обсуждение: ' . $model->title;
?>

<style>
body,
html {
    background-color: #f7f7f7;
}
.cke {
	border: 0 none;
}
.cke_contents {
	padding-left: 10px;
	padding-right: 10px;
}
</style>

<div class="message-boards-update" style="width: 780px; margin: 40px auto;">

    <div class="text-center" style="margin-bottom: 7px;">
        <a class="btn btn-link btn-xs" href="<?=\yii\helpers\Url::to(['/discussion/default/view','id' => $model->id])?>"><?= FA::icon('arrow-left') ?> отменить редактирование</a>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
</div>
