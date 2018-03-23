<div class="media" style="border-top: 1px solid #eee; border-bottom: 1px solid #eee; padding: 10px 0" onclick="location.href = '<?=\yii\helpers\Url::to(['/discussion/default/view','id' => $model->id])?>'">
    <div class="media-left">
        <img class="media-object" src="<?=$model->user->profile->avatarUrl ?>" width="60" alt="<?=$model->title ?>" style="border-radius: 50px; margin-top: 13px;">
        <?php if (0 && ($model->user_id == Yii::$app->user->id)) : ?>
        <?= $model->user_id == Yii::$app->user->id ? '<a style="font-size:11px;" href="'.\yii\helpers\Url::to(['/discussion/default/view','id' => $model->id]).'">редактировать</a>' : ''?>
        <a style="font-size:11px; color:#bd362f" href="<?=\yii\helpers\Url::to(['/discussion/default/view','id' => $model->id])?>" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">удалить</a>
        <?php endif;?>
    </div>

    <div class="media-body">
        <div style="color: #aa9c84; font-size: 13px;">
            <?=$model->user->username ?> &bull;
            <?= Yii::$app->formatter->asDate(date('Y-m-d',strtotime($model->created_at))) ?>

            <span class="label label-primary pull-right"><?=$model->commentsCount ?></span>



        </div>
        <div style="line-height: 1.6em;">
            <b><?=$model->title?></b> &mdash;
            <?= mb_substr(strip_tags($model->main_message), 0, 230,'utf-8') ?>
        </div>
    </div>
</div>