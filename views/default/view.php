<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $model common\models\MessageBoards */

$this->title = $model->title;
?>

<style>
html, body {
    background-color: #f7f7f7;
}
.comments .comment-content {
    box-shadow: none;
    padding: 0;
    border: 0 none;
}
.comments .comment-author-avatar img {
    border: 0 none;
    border-radius: 50px;
}
.comments .title-block {
    display: none;
}
</style>

<div style="width: 780px; margin: 70px auto 0;">
    <div class="panel panel-default" style="margin-bottom: -25px">
        <div class="panel-body" style="padding-bottom: 30px; position: relative;">


            <div class="text-center">
                <img src="<?=$model->getAvatar() ?>" width="60" alt="<?=$model->title ?>" style="border-radius: 50px; margin-top: -55px;">
            </div>

            <div class="text-left" style="position: absolute; margin: -25px 0 0 -8px; z-index: 100">
                <a class="btn btn-link btn-xs" style="color: #000" href="<?=\yii\helpers\Url::to(['/discussion/default/index'])?>"><?= FA::icon('arrow-left') ?> назад</a>
            </div>

            <?php if (($model->user_id == Yii::$app->user->id) || Yii::$app->user->can('administrator')) : ?>
                <div class=" text-right" style="position: absolute; margin: -25px 0 0 -5px; width: 97.5%">
                    <a class="btn btn-link btn-xs" style="color: #000" href="<?=\yii\helpers\Url::to(['/discussion/default/update','id' => $model->id])?>"><?= FA::icon('pencil') ?></a>
                    <?php if(Yii::$app->user->id == $model->user_id || Yii::$app->getModule('discussion')->isCanDelete()):?>
                    <a href="<?=\yii\helpers\Url::to(['/discussion/default/delete','id' => $model->id])?>" class="btn btn-link btn-xs" style="color: #000" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><?= FA::icon('trash') ?></a>
                    <?php endif;?>
                </div>
            <?php endif;?>

            <div class="text-center" style="margin-top: 5px; font-size: 13px;">
                <?php if ($model->user): ?>
                    Разместил
                    <?=$model->user->username ?> &bull;
                <?php endif; ?>
                <?= Yii::$app->formatter->asDate(date('Y-m-d',strtotime($model->created_at))) ?>
            </div>

            <div style="padding: 0 35px;">

                <h1 style="margin: 20px 0 20px; font-size: 26px; font-weight: bold;"><?= Html::encode($this->title) ?></h1>

                <div class="media-body"> 
                    <?=$model->main_message?>
                </div>

            </div>
        </div>
    </div>

    <?php if (class_exists('\yii2mod\comments\widgets\Comment')) echo \yii2mod\comments\widgets\Comment::widget([
        'model' => $model,
        'commentView' => '@vendor/pantera-digital/yii2-discussion-boards/views/comments/index'
    ]); ?>

</div>
